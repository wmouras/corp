<template>
    <app-layout>
        <template #header>
            <h2 class='font-semibold text-xl text-gray-800 leading-tight'>

                Pessoa Física

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

                            <input v-model="pesquisa.identidade" id='codigo_registro' name='codigo_registro' type='text' placeholder='Insira o registro' @keyup.enter="$event.target.nextElementSibling.focus()"
                                class='appearance-none block w-50 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                        </div>

                        <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>

                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='nome'>
                                Nome:
                            </label>
                            <input v-model="pesquisa.nome" id='nome_fantasia' name='nome' type='text' placeholder='Insira o nome'
                                class='appearance-none block w-65 bg-gray-50 text-gray-700 border border-blue-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white'>

                        </div>

                        <div class='w-full md:w-1/2 px-3 mb-6 md:mb-0'>
                            <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='cpf'>
                                CPF:
                            </label>
                            <input v-model="pesquisa.cpf" name='cpf' id='cpf' type='text' placeholder='Apenas números' v-mask="'##.###.###/####-##'"
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
                    <th class="px-6 pt-6 pb-4">Registro</th>
                    <th class="px-6 pt-6 pb-4">Nome</th>
                    <th class="px-6 pt-6 pb-4">CPF</th>
                    <th class="px-6 pt-6 pb-4">E-mail</th>
                    <th class="px-6 pt-6 pb-4" colspan="2">Ação</th>
                    </tr>
                    <tr v-for="pf in pfs" :key="pf.fk_id_pessoa" class="hover:bg-gray-100 focus-within:bg-gray-100">

                    <td class="border-t">
                        <span class="px-6 py-4 flex items-center focus:text-indigo-500">
                        {{ pf.codigo_registro }}
                        </span>
                    </td>
                    <td class="border-t">
                        <span class="px-6 py-4 flex items-center" tabindex="-1">
                        {{ pf.nome }}
                        </span>
                    </td>
                    <td class="border-t">
                        <input disabled type="text" class="px-6 py-4 flex items-center" v-model="pf.cpf" v-mask="'###.###.###-##'" tabindex="-2" />
                    </td>
                    <td class="border-t">
                        <span class="px-6 py-4 flex items-center" tabindex="-3">
                        Teste@teste.com
                        </span>
                    </td>

                    <td class="border-t w-px">
                        Editar
                        </a>
                    </td>
                    </tr>
                    <tr v-if="pfs.length == 0">
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

            pfs: [],
            pesquisa: {
                identidade: '',
                nome: '',
                cpf: '',
            },

        }),
        mounted(){

            axios.get('/pf/pessoafisica/lista', { headers: {
                'Content-Type': 'application/json'
                }
            }).then(response => {this.pfs = response.data });
        },
        methods: {
            editarPessoaFisica: function (id_pessoa){
                window.location.assign('/pf/pessoafisica/dados/'+id_pessoa)
            }
        }

    }
</script>
