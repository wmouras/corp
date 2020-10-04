<template>
    <app-layout>
        <template #header>
            <h2 class='font-semibold text-xl text-gray-800 leading-tight'>
                Cadastro Pessoa Jurídica
            </h2>
        </template>

        <div class='py-12'>
            <div class='max-w-7xl mx-auto sm:px-6 lg:px-8'>
                <div class='bg-white overflow-hidden shadow-xl sm:rounded-lg'>

                    <div class='row col-md-6'>

                        <form action='' id='frm-pessoa-juridica' name='frm-pessoa-juridica' method='POST'>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='nome_fantasia'>
                                    Nome Fantasia
                                </label>
                                <input id='nome_fantasia' name='nome_fantasia' type='text' placeholder='Insira o nome fantasia'
                                    class='appearance-none block w-full bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>
                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='nome_fantasia'>
                                    Razão Social
                                </label>
                                <input name='nome_fantasia' id='nome_fantasia' type='text' placeholder='Insira a razão social'
                                    class='appearance-none block w-full bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='cnpj'>
                                    CNPJ
                                </label>
                                <input name='cnpj' id='cnpj' type='text' placeholder='Apenas números' v-mask="'##.###.###/####-##'" v-model="vmCnpj"
                                class='appearance-none block w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='fk_id_tipo_empresa'>
                                    Tipo da Empresa
                                </label>

                                <v-select v-model="tipos.data" class='select-text block w-full bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:text-blue-500 focus:bg-white'
                                    id='fk_id_tipo_empresa'
                                    name='fk_id_tipo_empresa'
                                    placeholder='Escolha o tipo da empresa'
                                    :options='this.tipos'
                                    label='tipo_empresa'
                                    key='id_tipo_empresa'
                                />

                            </div>
                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='fk_id_tipo_estabelecimento'>
                                    Tipo Estabelecimento
                                </label>

                                <v-select v-once v-model="tpestabelecimento.data" class='select-text block w-full bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:text-blue-500 focus:bg-white'
                                    id='fk_id_tipo_estabelecimento'
                                    name='fk_id_tipo_estabelecimento'
                                    placeholder='Escolha o tipo do estabelecimento'
                                    :options='this.tpestabelecimento'
                                    label='tipo_estabelecimento'
                                    key='id_tipo_estabelecimento'
                                />

                            </div>
                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='grid-first-name'>
                                    Capital Social
                                </label>
                                <input name='capital_social' id='capital_social' type='text' placeholder='Insira a vírgula para incluir os centavos' v-mask='mask' v-model="capitalSocial"
                                class='appearance-none block w-full bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>
                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='grid-first-name'>
                                    Última alteração de capital
                                </label>
                                <input name='dt_ultima_alt_capital' id='dt_ultima_alt_capital' type='text' placeholder='Apenas números' v-mask="'##/##/####'" v-model="ultAltCapital"
                                class='appearance-none block w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>
                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='grid-first-name'>
                                    Última alteração Contratual
                                </label>
                                <input name='nr_ultima_alt_contratual' id='nr_ultima_alt_contratual' type='text' placeholder='Apenas números' v-mask="'##/##/####'" v-model="ultAltContratual"
                                class='appearance-none block w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>
                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='grid-first-name'>
                                    Objetivo Social
                                </label>
                                <input name='objetivo_social' id='objetivo_social' type='text' placeholder='Escolha o tipo de empresa' class='appearance-none block w-full bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <input type='hidden' name='usuario ' id='usuario'>
                            <input type='hidden' name='data_cadastro ' id='data_cadastro'>
                            <input type='hidden' name='data_alteracao' id='data_alteracao'>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0 ml-28'>
                                <button class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-10 ml-28 center'>
                                    Salvar
                                </button>
                            </div>
                        </form>

                    </div>


                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from './../Layouts/AppLayout';
    import vSelect from 'vue-select';
    import VueMask from 'v-mask'

    import 'vue-select/dist/vue-select.css';

    import createNumberMask from 'text-mask-addons/dist/createNumberMask';
    const maskDinheiro = createNumberMask({
        prefix: 'R$ ',
        allowDecimal: true,
        decimalSymbol: ',',
        includeThousandsSeparator: true,
        thousandsSeparatorSymbol: '.',
        allowNegative: false,
    });

    export default {
        name: 'pessoa-juridica',
        components: {
            AppLayout,
            vSelect,
        },
        data: () => ({

                tipos: [],
                tpestabelecimento: [],
                mask: maskDinheiro,
                capitalSocial: '',
                ultAltCapital: '',
                ultAltContratual: '',
                vmCnpj: '',

        }),
        mounted() {
            axios.get('/pessoajuridica/listatipo', { headers: {
                'Content-Type': 'application/json'
                }
            }).then(response => {this.tipos = response.data });

            axios.get('/pessoajuridica/listatpestabelecimento', { headers: {
                'Content-Type': 'application/json'
                }
            }).then(response => {this.tpestabelecimento = response.data });

        }

    }
</script>
