<template>
    <app-layout>
        <template #header>
            <h2 class='font-semibold text-xl text-gray-800 leading-tight'>
                Pessoa Jurídica
            </h2>
        </template>


        <div class='py-1'>
            <div class='max-w-7xl mx-auto sm:px-6 lg:px-8' id="div_1" ref="divDescricao">
                <div class='bg-white overflow-hidden shadow-xl sm:rounded-lg'>

                    <div class='row col-md-6 flex inline'>

                        <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='codigo_registro'>
                                Registro:
                            </label>
                            <input v-model="pesquisa.codigo_registro" id='codigo_registro' name='codigo_registro' type='text' placeholder='Insira o registro' @keyup.enter="$event.target.nextElementSibling.focus()"
                                class='appearance-none block w-50 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                        </div>

                        <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='nome_fantasia'>
                                Nome:
                            </label>
                            <input v-model="pesquisa.nome_fantasia" id='nome' name='nome_fantasia' type='text' placeholder='Insira o nome fantasia'
                                class='appearance-none block w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                        </div>
                        <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='cnpj'>
                                CPF:
                            </label>
                            <input v-model="pesquisa.cnpj" name='cnpj' id='cnpj' type='text' placeholder='Apenas números' v-mask="'###.###.###-##'"
                            class='appearance-none block w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                        </div>
                        <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0 mt-6'>
                            <button type='button' class='appearance-none block w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>
                                <i class="fas fa-search"></i><span class="ml-3">Pesquisar</span>
                            </button>
                            <button type='button' class='appearance-none block w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 ml-10 mb-3 leading-tight focus:outline-none focus:bg-white'>
                                <i class="fas fa-plus"></i><span class="ml-3">Novo</span>
                            </button>

                        </div>
                    </div>
                </div>

            </div>
            <div class='max-w-7xl mx-auto sm:px-6 lg:px-8' id="div_1" ref="divDescricao">
                <table class="w-full whitespace-no-wrap">
                    <tr class="text-left font-bold">
                    <th class="px-6 pt-6 pb-4">Fantasia</th>
                    <th class="px-6 pt-6 pb-4">Razão Social</th>
                    <th class="px-6 pt-6 pb-4">CNPJ</th>
                    <th class="px-6 pt-6 pb-4">E-mail</th>
                    <th class="px-6 pt-6 pb-4" colspan="2">Ação</th>
                    </tr>
                    <tr v-for="pj in pjs" :key="pj.fk_id_pessoa" class="hover:bg-gray-100 focus-within:bg-gray-100">

                    <td class="border-t">
                        <span class="px-6 py-4 flex items-center focus:text-indigo-500">

                        {{ pj.nome_fantasia }}

                        </span>
                    </td>
                    <td class="border-t">
                        <span class="px-6 py-4 flex items-center" tabindex="-1">
                        {{ pj.razao_social }}
                        </span>
                    </td>
                    <td class="border-t">
                        <input disabled type="text" class="px-6 py-4 flex items-center" v-model="pj.cnpj" v-mask="'##.###.###/####-##'" tabindex="-2" />
                    </td>
                    <td class="border-t">
                        <span class="px-6 py-4 flex items-center" tabindex="-3">
                        Teste
                        </span>
                    </td>

                    <td class="border-t w-px">
                        <a class="px-6 py-4 flex items-center cursor-pointer" @click="editarPessoafisica(pj.fk_id_pessoa)" tabindex="-4">
                        Editar
                        </a>
                    </td>
                    </tr>
                    <tr v-if="pjs.length === 0">
                    <td class="border-t px-6 py-4" colspan="4">Sem resultados para essa pesquisa.</td>
                    </tr>
                </table>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from './../../Layouts/AppLayout'
    import VueMask from 'v-mask';

    export default {
       name: 'ListaPessoaFisica',
        components: {
            AppLayout,
        },
        data: () => ({

            pjs: [],
            url: 'http://corporativo.local/pj/pessoafisica/dados/21',
            pesquisa: {
                codigo_registro: '',
                razao_social: '',
                nome_fantasia: '',
                cnpj: '',
                dt_registro: '',
            },

        }),
        mounted(){

             axios.get('/pf/pessoafisica/lista', { headers: {
                'Content-Type': 'application/json'
                }
            }).then(response => {this.pjs = response.data });

        },
        methods: {
            editarPessoafisica: function (id_pessoa){
                window.location.assign('/pf/pessoafisica/dados/'+id_pessoa)
            }
        }

    }
</script>
