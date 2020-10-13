<template>
    <app-layout>
        <template #header>
            <h2 class='font-semibold text-xl text-gray-800 leading-tight'>
                Cadastro Pessoa Física
            </h2>
        </template>

<ul class="flex border-b-2 max-w-7xl mx-auto">
    <li class="-mb-px mr-4">
        <a class="bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 text-blue-700 font-semibold" v-on:click.prevent="escolheTab(1)">Descrição</a>
    </li>
    <li class="mr-4">
        <a class="bg-white inline-block py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold" v-on:click.prevent="escolheTab(2)">Endereço e contado</a>
    </li>
    <li class="mr-4">
        <a class="bg-white inline-block py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold" v-on:click.prevent="escolheTab(3)">Quadro Técnico</a>
    </li>

</ul>
        <div class='py-1'>
            <div class='max-w-7xl mx-auto sm:px-6 lg:px-8' id="div_1" ref="divDescricao">
                <div class='bg-white overflow-hidden shadow-xl sm:rounded-lg'>

                    <div class='row col-md-6'>

                        <form ref="form" action='/pessoafisica/salvar' id='frm-pessoa-fisica' name='frm-pessoa-fisica' method='GET'>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='cpf'>
                                    CPF
                                </label>
                                <input v-model='pf.cpf' id='cpf' name='cpf' type='text' placeholder='Insira o cpf' v-mask="'###.###.###-##'"
                                    class='appearance-none block w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='nome'>
                                    Nome
                                </label>
                                <input v-model='pf.nome' id='nome' name='nome' type='text' placeholder='Insira o nome'
                                    class='appearance-none block w-full bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='identidade'>
                                    Identidade (RG)
                                </label>
                                <input v-model='pf.identidade' id='identidade' name='identidade' type='text' placeholder='Insira o identidade'
                                    class='appearance-none block w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='data_emissao_identidade'>
                                    Data de emissao da RG
                                </label>
                                <input v-model='pf.data_emissao_identidade' v-mask="'##/##/####'" id='data_emissao_identidade' name='data_emissao_identidade' type='text' placeholder='Insira o data_emissao_identidade'
                                    class='appearance-none block w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='data_nascimento'>
                                    Data nascimento
                                </label>
                                <input v-model='pf.data_nascimento' v-mask="'##/##/####'" id='data_nascimento' name='data_nascimento' type='text' placeholder='Insira o data_nascimento'
                                    class='appearance-none block w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='tipo_empresa'>
                                    Deficiente?
                                </label>

                                <v-select v-model="pf.deficiente" class='select-text block w-full bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:text-blue-500 focus:bg-white'
                                    item-text="text"
                                    item-value="id"
                                    placeholder='Possui alguma deficiência'
                                    :options="oDeficiente"
                                    label="text"
                                    value="id"
                                    :items="oDeficiente"
                                    :key="oDeficiente.id"

                                />

                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='tipo_empresa'>
                                    Nacionalidade
                                </label>

                                <v-select v-model="pf.nacionalidade" class='select-text block w-full bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:text-blue-500 focus:bg-white'
                                    item-text="nacionalidade"
                                    item-value="cd_acionalidade"
                                    placeholder='Nacionalidade'
                                    :options="oNacionalidade"
                                    label="nacionalidade"
                                    value="cd_acionalidade"
                                    :items="oNacionalidade"
                                    :key="oNacionalidade.cd_nacionalidade"

                                />

                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='fk_id_naturalidade'>
                                    Naturalidade
                                </label>
                                <input v-model='pf.fk_id_naturalidade' id='fk_id_naturalidade' name='fk_id_naturalidade' type='text' placeholder='Insira o fk_id_naturalidade'
                                    class='appearance-none block w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='foto'>
                                    Foto
                                </label>
                                <input v-model='pf.foto' id='foto' name='foto' type='text' placeholder='Insira o foto'
                                    class='appearance-none block w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='mae'>
                                    Nome da mae
                                </label>
                                <input v-model='pf.mae' id='mae' name='mae' type='text' placeholder='Insira o mae'
                                    class='appearance-none block w-full bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='pai'>
                                    Nome do pai
                                </label>
                                <input v-model='pf.pai' id='pai' name='pai' type='text' placeholder='Insira o pai'
                                    class='appearance-none block w-full bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='tipo_empresa'>
                                    Sexo
                                </label>

                                <v-select v-model="pf.sexo" class='select-text block w-full bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:text-blue-500 focus:bg-white'
                                    item-text="text"
                                    item-value="id"
                                    placeholder='Sexo'
                                    :options="oSexo"
                                    label="text"
                                    value="id"
                                    :items="oSexo"
                                    :key="oSexo.id"

                                />

                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='tipo_sangue'>
                                    tipo sanguíneo
                                </label>
                                <input v-model='pf.tipo_sangue' id='tipo_sangue' name='tipo_sangue' type='text' placeholder='Insira o tipo_sangue'
                                    class='appearance-none block w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div><div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='titulo_eleitor'>
                                    título eleitor
                                </label>
                                <input v-model='pf.titulo_eleitor' v-mask="'#### #### ## ##'" id='titulo_eleitor' name='titulo_eleitor' type='text' placeholder='Insira o titulo_eleitor'
                                    class='appearance-none block w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='zona_titulo_eleitor'>
                                    zona título eleitor
                                </label>
                                <input v-model='pf.zona_titulo_eleitor' id='zona_titulo_eleitor' name='zona_titulo_eleitor' type='text' placeholder='Insira o zona_titulo_eleitor'
                                    class='appearance-none block w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='secao_titulo_eleitor'>
                                    Seção título eleitor
                                </label>
                                <input v-model='pf.secao_titulo_eleitor' id='secao_titulo_eleitor' name='secao_titulo_eleitor' type='text' placeholder='Insira o secao_titulo_eleitor'
                                    class='appearance-none block w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='observacao'>
                                    Observação
                                </label>

                                <textarea v-model='pf.observacao' id='observacao' name='observacao'  placeholder='Insira o observacao' class='appearance-none block w-full h-32 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white resize border rounded focus:outline-none focus:shadow-outline'></textarea>
                            </div>

                        </form>

                    </div>


                </div>
            </div>

<!-- Aba de cadastro de contato e endereço -->

            <div class='max-w-7xl mx-auto sm:px-6 lg:px-8' id="div_2" ref="divContato" style="display:none;">

                <div class='bg-white overflow-hidden shadow-xl sm:rounded-lg'>

                    <div class='row col-md-6'>

                        <form ref="form" action='/pessoafisica/endereco' id='frm-pessoa-endereco' name='frm-pessoa-endereco' method='GET'>

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

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='complemento'>
                                    Complemento
                                </label>
                                <input name='complemento' id='complemento' type='text' placeholder='Complemento'
                                class='appearance-none block w-full bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='bairro'>
                                    Bairo
                                </label>
                                <input name='bairro' id='bairro' type='text' placeholder='Bairro'
                                class='appearance-none block w-full bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                            </div>

                            <div class="max-w-2xl flex">

                                <div class='w-24 md:w-1/2 px-3 mb-6 md:mb-0'>
                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='uf'>
                                        Estado
                                    </label>
                                    <input name='uf' id='uf' type='text' placeholder='UF'
                                    class='appearance-none block w-64 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                                </div>

                                <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='cidade'>
                                        Cidade
                                    </label>
                                    <input name='cidade' id='cidade' type='text' placeholder='Cidade'
                                    class='appearance-none block w-full bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                                </div>

                            </div>

                            <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                                <button type='submit' v-on:click="exibe()" class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-12 center'>
                                    Salvar
                                </button>
                            </div>

                            <input type="hidden" name="fk_id_uf" id="fk_id_uf" value="2"/>
                            <input type="hidden" name="fk_id_municipio" id="fk_id_municipio" value="3"/>

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
    import VueMask from 'v-mask'

    import 'vue-select/dist/vue-select.css';

    export default {
        name: 'pessoa-fisica',
        components: {
            AppLayout,
            vSelect,
        },
        data: () => ({

            oSexo       : [{'id': '1', 'text':'Masculino'}, {'id': '2', 'text':'Feminino'}],
            oDeficiente : [{'id': 'S', 'text':'SIM'}, {'id': 'N', 'text':'NÃO'}],
            oNacionalidade: [],
            pf:{
                cpf: '',
                data_emissao_identidade: '',
                data_nascimento: '',
                deficiente: [],
                fk_cd_nacionalidade: '',
                fk_id_naturalidade: '',
                foto: '',
                identidade: '',
                mae: '',
                nome: '',
                observacao: '',
                pai: '',
                secao_titulo_eleitor: '',
                sexo: [],
                tipo_sangue: '',
                titulo_eleitor: '',
                zona_titulo_eleitor: '',
            }

        }),
        created() {

            axios.get('/pessoafisica/nacionalidade', { headers: {
                'Content-Type': 'application/json'
                }
            }).then(response => {this.oNacionalidade = response.data });

            if(this.$page.pf.fk_id_pessoa != NaN)
            {
                this.pf = this.$page.pf;

                if( this.pf.sexo == 1 )
                {
                    this.pf.sexo = [{'id': '1', 'text':'Masculino'}]
                }
                if( this.pf.sexo == 2 )
                {
                    this.pf.sexo = [{'id': '2', 'text':'Feminino'}]
                }
                else
                {
                    [{'id': '1', 'text':'Masculino'}, {'id': '2', 'text':'Feminino'}]
                }

                if(this.pf.defiente == 'n'){
                    this.pf.defiente= [{'id': 'N', 'text':'Não'}]
                }
                if(this.pf.defiente == 's')
                {
                    this.pf.defiente= [{'id': 'S', 'text':'SIM'}]
                }
                else
                {
                    oDeficiente : [{'id': 'S', 'text':'SIM'}, {'id': 'N', 'text':'NÃO'}]
                }
            }

            console.log( this.$page.pf );

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
        }

    }
</script>
