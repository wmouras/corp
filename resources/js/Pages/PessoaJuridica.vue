<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Cadastro Pessoa Jurídica
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                    <div class="row col-md-6">

                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                Nome
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="nome" name="nome" type="text" placeholder="Insira seu nome">
                            <p class="text-red-500 text-xs italic">Favor preencher este campo.</p>
                        </div>

                        <div class="form-group"><label>Razão Social <span class="text-danger">*</span></label><input type="text"
                            name="razao_social" id="razao_social" class="form-control" placeholder="Digite a razão social" required></div>
                        <div class="form-group"><label>Nome Fantasia<span class="text-danger">*</span></label><input type="text"
                            name="nome_fantasia" id="nome_fantasia" class="form-control" placeholder="Digite o nome fantasia" required></div>
                        <div class="form-group"><label>Tipo Empresa <span class="text-danger">*</span></label><input type="text"
                            name="fk_id_tipo_empresa" id="fk_id_tipo_empresa" class="form-control" placeholder="Escolha o tipo" required></div>
                        <div class="form-group"><label>Tipo do estabelcimento <span class="text-danger">*</span></label><input type="text"
                            name="fk_id_tipo_estabelecimento" id="fk_id_tipo_estabelecimento" class="form-control" placeholder="Escolha o tipo" required></div>
                        <div class="form-group"><label>Capital Social <span class="text-danger">*</span></label><input type="text"
                            name="capital_social" id="capital_social" class="form-control" placeholder="Digite o valor" required></div>
                        <div class="form-group"><label>Última alktração de capital<span class="text-danger">*</span></label><input type="text"
                            name="dt_ultima_alt_capital " id="dt_ultima_alt_capital" class="form-control" placeholder="Digite a data" required></div>
                        <div class="form-group"><label>Ùltima alteração contratual <span class="text-danger">*</span></label><input type="text"
                            name="nr_ultima_alt_contratual" id="nr_ultima_alt_contratual" class="form-control" placeholder="Data da últiam alteração do contrato" required></div>
                        <div class="form-group"><label>Objetivo Social <span class="text-danger">*</span></label><input type="text"
                            name="objetivo_social" id="objetivo_social" class="form-control" placeholder="Digite o objetivo social" required></div>
                        <div class="form-group"><label>Nome <span class="text-danger">*</span></label><input type="text"
                            name="observacoes" id="observacoes" class="form-control" placeholder="Digite Suas observações" required></div>

                        <input type="hidden" name="usuario " id="usuario">
                        <input type="hidden" name="data_cadastro " id="data_cadastro">
                        <input type="hidden" name="data_alteracao" id="data_alteracao">
                    </div>

                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from './../Layouts/AppLayout'    

    export default {
        components: {
            AppLayout,            
        },
    }
</script>
