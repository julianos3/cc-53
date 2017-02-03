<ul class="nav nav-tabs nav-tabs-line" data-plugin="nav-tabs" role="tablist">
    <li class="active" role="presentation">
        <a data-toggle="tab" href="<?php echo e(route('portal.condominium.user.edit', ['id'=> $id])); ?>" aria-controls="tabDadosPessoais" role="tab">
            Dados Pessoais
        </a>
    </li>
    <li>
        <a href="<?php echo e(route('portal.condominium.user.unit', ['id'=> $id])); ?>" aria-controls="tabUnit" role="tab">
            Unidades
        </a>
    </li>
    <li>
        <a href="<?php echo e(route('portal.condominium.user.config', ['id'=> $id])); ?>" aria-controls="tabUnit" role="tab">
            Configurações
        </a>
    </li>
    <li class="dropdown" role="presentation">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
            <span class="caret"></span>
            Menu
        </a>
        <ul class="dropdown-menu" role="menu">
            <li class="active" role="presentation">
                <a data-toggle="tab" href="<?php echo e(route('portal.condominium.user.edit', ['id'=> $id])); ?>" aria-controls="exampleTabsLineOne" role="tab">
                    Dados pessoais
                </a>
            </li>
            <li role="presentation">
                <a data-toggle="tab" href="<?php echo e(route('portal.condominium.user.unit', ['id'=> $id])); ?>" aria-controls="exampleTabsLineTwo" role="tab">
                    Unidades
                </a>
            </li>
            <li role="presentation">
                <a data-toggle="tab" href="<?php echo e(route('portal.condominium.user.config', ['id'=> $id])); ?>" aria-controls="exampleTabsLineTwo" role="tab">
                    Configurações
                </a>
            </li>
        </ul>
    </li>
</ul>