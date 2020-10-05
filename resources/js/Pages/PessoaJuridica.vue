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

                        <form ref="form" action='/pessoajuridica/salvar' id='frm-pessoa-juridica' name='frm-pessoa-juridica' method='GET' v-on:submit="exibe">

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='codigo_registro'>
                                    Registro
                                </label>
                                <input id='codigo_registro' name='codigo_registro' type='text' placeholder='Insira o registro'
                                    class='appearance-none block w-full bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='nome_fantasia'>
                                    Nome Fantasia
                                </label>
                                <input id='nome_fantasia' name='nome_fantasia' type='text' placeholder='Insira o nome fantasia'
                                    class='appearance-none block w-full bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>
                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='razao_social'>
                                    Razão Social
                                </label>
                                <input name='razao_social' id='razao_social' type='text' placeholder='Insira a razão social'
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
                                    :options='tipos'
                                    label='tipo_empresa'
                                    value='id_tipo_empresa'
                                />

                            </div>
                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='fk_id_tipo_estabelecimento'>
                                    Tipo Estabelecimento
                                </label>

                                <v-select v-model="tpestabelecimento.data" class='select-text block w-full bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:text-blue-500 focus:bg-white'
                                    id='fk_id_tipo_estabelecimento'
                                    name='fk_id_tipo_estabelecimento'
                                    placeholder='Escolha o tipo do estabelecimento'
                                    :options='tpestabelecimento'
                                    label='tipo_estabelecimento'
                                    value="id_tipo_estabelecimento"
                                />

                            </div>
                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='capital_social'>
                                    Capital Social
                                </label>
                                <input name='capital_social' id='capital_social' type='text' placeholder='Insira a vírgula para incluir os centavos' v-mask='mask' v-model="capitalSocial"
                                class='appearance-none block w-full bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>
                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='dt_ultima_alt_capital'>
                                    Última alteração de capital
                                </label>
                                <input name='dt_ultima_alt_capital' id='dt_ultima_alt_capital' type='text' placeholder='Apenas números' v-mask="'##/##/####'" v-model="ultAltCapital"
                                class='appearance-none block w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>
                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='nr_ultima_alt_contratual'>
                                    Última alteração Contratual
                                </label>
                                <input name='nr_ultima_alt_contratual' id='nr_ultima_alt_contratual' type='text' placeholder='Apenas números'
                                class='appearance-none block w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>
                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='objetivo_social'>
                                    Objetivo Social
                                </label>
                                <input name='objetivo_social' id='objetivo_social' type='text' placeholder='Escolha o tipo de empresa' class='appearance-none block w-full bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0 ml-28'>
                                <button type='button' v-on:click="exibe()" class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-10 ml-28 center'>
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

                frm_pj: null,
                tipos: [],
                tpestabelecimento: [],
                mask: maskDinheiro,
                capitalSocial: '',
                ultAltCapital: '',
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

        },
        methods: {
            exibe: function () {
                // console.log(this.$data.tipos.data.id_tipo_empresa)
                // console.log(this.$data.tipos.data.id_tipo_estabelecimenbto)
                console.log(this.$refs.form.codigo_registro.value)
            }
        }

    }
</script>
