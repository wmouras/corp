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
                                Nome Fantasia
                            </label>
                            <input id="nome_fantasia" name="nome_fantasia" type="text" placeholder="Insira o nome fantasia" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                            <p class="text-red-500 text-xs italic">Favor preencher este campo.</p>
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                Razão Social
                            </label>
                            <input name="nome_fantasia" id="nome_fantasia" type="text" placeholder="Insira a razão social" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                            <p class="text-red-500 text-xs italic">Favor preencher este campo.</p>
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                Tipo Empresa
                            </label>
                            <input name="fk_id_tipo_empresa" id="fk_id_tipo_empresa" type="text" placeholder="Escolha o tipo de empresa" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                            <p class="text-red-500 text-xs italic">Favor preencher este campo.</p>
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                Tipo do estabelcimento
                            </label>
                            <input name="fk_id_tipo_estabelecimento" id="fk_id_tipo_estabelecimento" type="text" placeholder="Escolha o tipo de empresa" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                            <p class="text-red-500 text-xs italic">Favor preencher este campo.</p>
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                Capital Social
                            </label>
                            <input name="capital_social" id="capital_social" type="text" placeholder="Escolha o tipo de empresa" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                            <p class="text-red-500 text-xs italic">Favor preencher este campo.</p>
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                Última alteração de capital
                            </label>
                            <input name="dt_ultima_alt_capital" id="dt_ultima_alt_capital" type="text" placeholder="Escolha o tipo de empresa" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                            <p class="text-red-500 text-xs italic">Favor preencher este campo.</p>
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                Última alteração Contratual
                            </label>
                            <input name="nr_ultima_alt_contratual" id="nr_ultima_alt_contratual" type="text" placeholder="Escolha o tipo de empresa" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                            <p class="text-red-500 text-xs italic">Favor preencher este campo.</p>
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                Objetivo Social
                            </label>
                            <input name="objetivo_social" id="objetivo_social" type="text" placeholder="Escolha o tipo de empresa" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                            <p class="text-red-500 text-xs italic">Favor preencher este campo.</p>
                        </div>
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
