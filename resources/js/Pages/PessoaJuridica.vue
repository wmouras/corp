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

                        <form ref="form" action='/pessoajuridica/salvar' id='frm-pessoa-juridica' name='frm-pessoa-juridica' method='GET'>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='codigo_registro'>
                                    Registro
                                </label>
                                <input id='codigo_registro' name='codigo_registro' type='text' placeholder='Insira o registro'
                                    class='appearance-none block w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

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

                                <v-select v-model="vModelEmpresa" class='select-text block w-full bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:text-blue-500 focus:bg-white'
                                    id='tipo_empresa'
                                    name='tipo_empresa'
                                    item-text="tipo_empresa"
                                    item-value="id_tipo_empresa"
                                    placeholder='Escolha o tipo da empresa'
                                    :options='tipos'
                                    label='tipo_empresa'
                                    value='id_tipo_empresa'
                                    :items="tipos"
                                    @input="getIdTipoEmpresa($data.tipos.data.id_tipo_empresa)"
                                />

                            </div>
                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='fk_id_tipo_estabelecimento'>
                                    Tipo Estabelecimento
                                </label>

                                <v-select v-model="vModelEstabelecimento" class='select-text block w-full bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:text-blue-500 focus:bg-white'
                                    id='tipo_estabelecimento'
                                    name='tipo_estabelecimento'
                                    item-text="tipo_estabelecimento"
                                    item-value="id_tipo_estabelecimento"
                                    placeholder='Escolha o tipo do estabelecimento'
                                    :options='tpestabelecimento'
                                    label='tipo_estabelecimento'
                                    value="id_tipo_estabelecimento"
                                    :items="tpestabelecimento"
                                    @input="getIdEstabelecimento($data.tpestabelecimento.data.id_tipo_estabelecimento)"
                                />

                            </div>
                            <!-- <p>{{this.valorEstabelecimento}}</p> -->
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
                                    Número e data da última alteração Contratual
                                </label>
                                <input name='nr_ultima_alt_contratual' id='nr_ultima_alt_contratual' type='text' placeholder='Números' v-mask="'####'" v-model="nrUltAltContratual"
                                class='appearance-none inline w-24 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>
                                <input name='dt_ultima_alt_contratual' id='dt_ultima_alt_contratual' type='text' placeholder='Apenas números' v-mask="'##/##/####'" v-model="ultAltContratual"
                                class='appearance-none inline w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 ml-3 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>
                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='objetivo_social'>
                                    Objetivo Social
                                </label>
                                <input name='objetivo_social' id='objetivo_social' type='text' placeholder='Insira o objetivo social da empresa' class='appearance-none block w-full bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0 ml-28'>
                                <button type='submit' v-on:click="exibe()" class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-10 ml-28 center'>
                                    Salvar
                                </button>
                            </div>

                            <input type="hidden" name="fk_id_tipo_estabelecimento" id="fk_id_tipo_estabelecimento" value="2"/>
                            <input type="hidden" name="fk_id_tipo_empresa" id="fk_id_tipo_empresa" value="3"/>

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
        valorEstabelecimento: null,
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
                vModelEmpresa: null,
                vModelEstabelecimento: null,
                mask: maskDinheiro,
                capitalSocial: '',
                ultAltCapital: '',
                ultAltContratual: '',
                nrUltAltContratual: '',
                vmCnpj: '',

        }),
        mounted() {

            // event.preventDefault();
            // this.tpestabelecimento.id_tipo_estabelecimento = this.$refs.form.fk_id_tipo_estabelecimento.value
            // this.tipos.id_tipo_empresa = this.$refs.form.fk_id_tipo_empresa.value

            axios.get('/pessoajuridica/listatipo', { headers: {
                'Content-Type': 'application/json'
                }
            }).then(response => {this.tipos = response.data });

            axios.get('/pessoajuridica/listatpestabelecimento', { headers: {
                'Content-Type': 'application/json'
                }
            }).then(response => {this.tpestabelecimento = response.data });

            // this.vModelEstabelecimento = {'id_tipo_estabelecimento': 0, 'tipo_estabelecimento': 'SECAO'};
            // this.vModelEmpresa = {'id_tipo_empresa': 3, 'tipo_empresa': 'CONSORCIO COM PERSONALIDADE JURIDICA'};

        },
        methods: {
            getIdEstabelecimento: function(id) {
                this.$data.tpestabelecimento.data.id_tipo_estabelecimento = this.$refs.form.fk_id_tipo_estabelecimento.value
            },
            getIdTipoEmpresa: function(id) {
                this.$data.tipos.data.id_tipo_empresa = this.$refs.form.fk_id_tipo_empresa.value
            },
        }

    }
</script>
