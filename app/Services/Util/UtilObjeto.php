<?php

namespace CentralCondo\Services\Util;

use Illuminate\Contracts\Filesystem\Factory as Storage;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;

class UtilObjeto
{

    protected $filesystem;

    protected $storage;

    public function __construct(Filesystem $filesystem, Storage $storage)
    {
        $this->filesystem = $filesystem;
        $this->storage = $storage;
    }

    public function upload($file, $path, $validator)
    {
        $rules = array('file' => 'required|mimes:' . $validator);
        $validator = Validator::make(array('file' => $file), $rules);
        if ($validator->passes()) {

            $nameImage = md5($file->getFilename());
            $extension = $file->getClientOriginalExtension();
            $this->storage->put($path . $nameImage, $this->filesystem->get($file));
            $mime_type = $this->storage->mimeType($path . $nameImage, $this->filesystem->get($file));

            $result = [
                'name' => $file->getClientOriginalName(),
                'file' => $nameImage,
                'extension' => $extension,
                'mime_type' => $mime_type
            ];

            return $result;
        }
        return false;
    }

    public function paginate($dados, $limit = '')
    {
        $currentPage = Paginator::resolveCurrentPage() - 1;
        $perPage = 15;
        if((int)$limit > 0){
            $perPage = $limit;
        }
        $currentPageSearchResults = $dados->slice($currentPage * $perPage, $perPage)->all();
        $dados = new LengthAwarePaginator($currentPageSearchResults, count($dados), $perPage);

        return $dados;
    }

    public function valida_cnpj($cnpj)
    {
        // Deixa o CNPJ com apenas números
        $cnpj = preg_replace('/[^0-9]/', '', $cnpj);

        // Garante que o CNPJ é uma string
        $cnpj = (string)$cnpj;

        // O valor original
        $cnpj_original = $cnpj;

        // Captura os primeiros 12 números do CNPJ
        $primeiros_numeros_cnpj = substr($cnpj, 0, 12);

        /**
         * Multiplicação do CNPJ
         *
         * @param string $cnpj Os digitos do CNPJ
         * @param int $posicoes A posição que vai iniciar a regressão
         * @return int O
         *
         */
        if (!function_exists('multiplica_cnpj')) {
            function multiplica_cnpj($cnpj, $posicao = 5)
            {
                // Variável para o cálculo
                $calculo = 0;

                // Laço para percorrer os item do cnpj
                for ($i = 0; $i < strlen($cnpj); $i++) {
                    // Cálculo mais posição do CNPJ * a posição
                    $calculo = $calculo + ($cnpj[$i] * $posicao);

                    // Decrementa a posição a cada volta do laço
                    $posicao--;

                    // Se a posição for menor que 2, ela se torna 9
                    if ($posicao < 2) {
                        $posicao = 9;
                    }
                }
                // Retorna o cálculo
                return $calculo;
            }
        }

        // Faz o primeiro cálculo
        $primeiro_calculo = multiplica_cnpj($primeiros_numeros_cnpj);

        // Se o resto da divisão entre o primeiro cálculo e 11 for menor que 2, o primeiro
        // Dígito é zero (0), caso contrário é 11 - o resto da divisão entre o cálculo e 11
        $primeiro_digito = ($primeiro_calculo % 11) < 2 ? 0 : 11 - ($primeiro_calculo % 11);

        // Concatena o primeiro dígito nos 12 primeiros números do CNPJ
        // Agora temos 13 números aqui
        $primeiros_numeros_cnpj .= $primeiro_digito;

        // O segundo cálculo é a mesma coisa do primeiro, porém, começa na posição 6
        $segundo_calculo = multiplica_cnpj($primeiros_numeros_cnpj, 6);
        $segundo_digito = ($segundo_calculo % 11) < 2 ? 0 : 11 - ($segundo_calculo % 11);

        // Concatena o segundo dígito ao CNPJ
        $cnpj = $primeiros_numeros_cnpj . $segundo_digito;

        // Verifica se o CNPJ gerado é idêntico ao enviado
        if ($cnpj === $cnpj_original) {
            return true;
        }
        return false;
    }

}