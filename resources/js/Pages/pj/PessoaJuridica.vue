<template>
    <app-layout>
        <template #header>
            <h2 class='font-semibold text-xl text-gray-800 leading-tight'>
                Cadastro Pessoa Jurídica
            </h2>
        </template>

<ul class="flex border-b-2 max-w-7xl mx-auto">
    <li class="-mb-px mr-4">
        <a class="bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 cursor-pointer text-blue-700 font-semibold" v-on:click.prevent="escolheTab(1)">Descrição</a>
    </li>
    <li class="mr-4">
        <a class="bg-white inline-block py-2 px-4 text-blue-500 hover:text-blue-800 cursor-pointer font-semibold" v-on:click.prevent="escolheTab(2)">Endereço e contado</a>
    </li>
    <li class="mr-4">
        <a class="bg-white inline-block py-2 px-4 text-blue-500 hover:text-blue-800 cursor-pointer font-semibold" v-on:click.prevent="escolheTab(3)">Quadro Técnico</a>
    </li>

</ul>
        <div class='py-1'>
            <div class='max-w-7xl mx-auto sm:px-6 lg:px-8' id="div_1" ref="divDescricao">
                <div class='bg-white overflow-hidden shadow-xl sm:rounded-lg'>

                    <div class='row col-md-6'>

                        <form @submit.prevent="salvarDescricao()" ref="frmDescricao" action='/pessoajuridica/salvar' id='frm-pessoa-juridica' name='frm-pessoa-juridica' method='GET'>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='codigo_registro'>
                                    Registro
                                </label>
                                <input v-model="pj.codigo_registro" id='codigo_registro' name='codigo_registro' type='text' placeholder='Insira o registro'
                                    class='appearance-none block w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='nome_fantasia'>
                                    Nome Fantasia
                                </label>
                                <input v-model="pj.nome_fantasia" id='nome_fantasia' name='nome_fantasia' type='text' placeholder='Insira o nome fantasia'
                                    class='appearance-none block w-full bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>
                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='razao_social'>
                                    Razão Social
                                </label>
                                <input v-model="pj.razao_social" name='razao_social' id='razao_social' type='text' placeholder='Insira a razão social'
                                    class='appearance-none block w-full bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='cnpj'>
                                    CNPJ
                                </label>
                                <input v-model="pj.cnpj" name='cnpj' id='cnpj' type='text' placeholder='Apenas números' v-mask="'##.###.###/####-##'"
                                class='appearance-none block w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='tipo_empresa'>
                                    Tipo da Empresa
                                </label>

                                <v-select v-model="pj.empresa" class='select-text block w-full bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:text-blue-500 focus:bg-white'
                                    id='tipo_empresa'
                                    name='tipo_empresa'
                                    item-text="tipo_empresa"
                                    item-value="id_tipo_empresa"
                                    placeholder='Escolha o tipo da empresa'
                                    :options="tpempresa"
                                    label="tipo_empresa"
                                    value="id_tipo_empresa"
                                    :items="tpempresa"

                                />

                            </div>
                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='tipo_estabelecimento'>
                                    Tipo Estabelecimento
                                </label>

                                <v-select v-model="pj.estabelecimento" class='select-text block w-full bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:text-blue-500 focus:bg-white'
                                    id='tipo_estabelecimento'
                                    name='tipo_estabelecimento'
                                    item-text="tipo_estabelecimento"
                                    item-value="id_tipo_estabelecimento"
                                    placeholder='Escolha o tipo do estabelecimento'
                                    :options='tpestabelecimento'
                                    label='tipo_estabelecimento'
                                    value="id_tipo_estabelecimento"
                                    :items="tpestabelecimento"
                                />

                            </div>
                            <!-- <p>{{this.valorEstabelecimento}}</p> -->
                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='capital_social'>
                                    Capital Social
                                </label>
                                <input v-model="pj.capital_social" name='capital_social' id='capital_social' type='text' placeholder='Insira a vírgula para incluir os centavos' v-mask='mask'
                                class='appearance-none block w-full bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>
                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='dt_ultima_alt_capital'>
                                    Última alteração de capital
                                </label>
                                <input v-model="pj.dt_ultima_alt_capital" name='dt_ultima_alt_capital' id='dt_ultima_alt_capital' type='text' placeholder='Apenas números' v-mask="'##/##/####'"
                                class='appearance-none block w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>
                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='nr_ultima_alt_contratual'>
                                    Número e data da última alteração Contratual
                                </label>
                                <input v-model="pj.nr_ultima_alt_contratual" name='nr_ultima_alt_contratual' id='nr_ultima_alt_contratual' type='text' placeholder='Números' v-mask="'####'"
                                class='appearance-none inline w-24 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>
                                <input v-model="pj.dt_ultima_alt_contratual" name='dt_ultima_alt_contratual' id='dt_ultima_alt_contratual' type='text' placeholder='Apenas números' v-mask="'##/##/####'"
                                class='appearance-none inline w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 ml-3 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>
                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='objetivo_social'>
                                    Objetivo Social
                                </label>
                                <input v-model="pj.objetivo_social" name='objetivo_social' id='objetivo_social' type='text' placeholder='Insira o objetivo social da empresa' class='appearance-none block w-full bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0 ml-28'>
                                <button type='button' @click.stop.prevent="salvarDescricao()" class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-10 ml-28 center'>
                                    Salvar
                                </button>
                            </div>

                        </form>

                    </div>


                </div>
            </div>

<!-- Aba de cadastro de contato e endereço -->

            <div class='max-w-7xl mx-auto sm:px-6 lg:px-8' id="div_2" ref="divContato" style="display:none;">

                <div class='bg-white overflow-hidden shadow-xl sm:rounded-lg'>

                    <div class='row col-md-6'>

                        <form ref="frmEndereco" action='/pessoajuridica/endereco' id='frm-pessoa-endereco' name='frm-pessoa-endereco' method='GET'>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0 block'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='cep'>
                                    CEP
                                </label>
                                <input name='cep' id='cep' type='text' placeholder='Insira o CEP' v-mask="'##.###-###'"
                                    class='appearance-none block w-26 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class="row-auto max-w-full flex">
                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='endereco'>
                                    Endereço
                                </label>
                                <input id='endereco' name='endereco' type='text' placeholder='Endereço'
                                    class='appearance-none block w-full bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='numero'>
                                    Número
                                </label>
                                <input id='numero' name='numero' type='text' placeholder='Nº'
                                    class='appearance-none block w-20 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>
                            </div>
                            <div class="row-auto max-w-full flex">
                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='cidade'>
                                    Cidade
                                </label>
                                <input name='cidade' id='cidade' type='text' placeholder='Cidade'
                                class='appearance-none block w-full bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='uf'>
                                    Estado
                                </label>
                                <input name='uf' id='uf' type='text' placeholder='UF'
                                class='appearance-none block w-20 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>
                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0 ml-28'>
                                <button type='submit' v-on:click="salvaEndereco()" class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-10 ml-28 center'>
                                    Salvar
                                </button>
                            </div>

                        </form>

                    </div>


                </div>

            </div>
            <div class='max-w-7xl mx-auto sm:px-6 lg:px-8' stye="display: none;" id="div_3" ref="divQuadro">
            </div>
        </div>
    </app-layout>
</template>

<script>

    import AppLayout from './../../Layouts/AppLayout';
    import vSelect from 'vue-select';
    import VueMask from 'v-mask';

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
        name: 'pj',
        components: {
            AppLayout,
            vSelect,
        },
        props: {
            pessoa: Object,
        },
        data: () => ({

            mask: maskDinheiro,
            tpempresa: [],
            tpestabelecimento: [],
            pj: {
                codigo_registro: '',
                razao_social: '',
                nome_fantasia: '',
                empresa: [],
                estabelecimento: [],
                capital_social: '',
                dt_ult_lt_capital: '',
                dt_ult_alt_contratual: '',
                nr_ult_alt_contratual: '',
                cnpj: '',
            },
            endereco:{
                cep: '',
            }


        }),
        mounted() {

            this.pj = this.$page.pj;

            axios.get('/pessoajuridica/listatipo', { headers: {
                'Content-Type': 'application/json'
                }
            }).then(response => {this.tpempresa = response.data });

            axios.get('/pessoajuridica/listatpestabelecimento', { headers: {
                'Content-Type': 'application/json'
                }
            }).then(response => {this.tpestabelecimento = response.data });

            console.log( this.pj )
        },
        methods: {

            escolheTab: function (div) {

                this.$refs.divDescricao.style.display = "none"
                this.$refs.divContato.style.display = "none"
                this.$refs.divQuadro.style.display = "none"

                if (div == '1')
                    this.$refs.divDescricao.style.display = "block";
                if (div == '2')
                    this.$refs.divContato.style.display = "block";
                if (div == '3')
                    this.$refs.divQuadro.style.display = "block";

            },
            salvarDescricao: function () {
                // console.log( this.pj );
            }
        }

    }
</script>
