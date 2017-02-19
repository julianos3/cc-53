<script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/checkout/pagseguro.directpayment.js"></script>
<script>
    PagSeguroDirectPayment.setSessionId('{{ PagSeguro::startSession() }}'); //PagSeguroRecorrente tem um método identico, use o que preferir neste caso, não tem diferença.

    <!-- Quando clicar no botão de pagamento
    PagSeguroDirectPayment.getSenderHash();
    -->
</script>