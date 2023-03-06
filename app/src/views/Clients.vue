<template>
    <div class="clients container">
        <div class="row">
            <div class="col-12 text-end mt-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_client_modal">
                    <i class="fas fa-plus"></i> 
                    Adicionar
                </button>
            </div>
        </div>
        
        <SaveClient @stored="stored"/>
        <Message :message="message" :typeMessage="typeMessage" :loading="loading"/>

        <form class="bg-primary bg-gradient p-3 rounded-1 text-light">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" id="name" v-model="name" name="name">
                    </div>
                </div>    
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input type="text" name="cpf" v-model="cpf" id="cpf" class="form-control" v-mask="'###.###.###-##'">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group my-3 text-end">
                       <button type="button" class="btn btn-danger" @click="clear">
                            <i class="fas fa-eraser"></i> Limpar
                        </button>

                       <button type="button" class="btn btn-light ms-2" @click="get">
                            <i class="fas fa-search"></i> Buscar
                        </button>
                    </div>
                </div>
            </div>
        </form>

        <div class="row mt-3">
            <div class="table-responsive" v-if="clients.length > 0">
                <table class="table table-striped table-hover w-100">
                    <thead class="table-dark">
                        <tr>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Telefone</th>
                            <th class="col-1 text-center">Remover</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="client in clients" :key="client.id">
                            <td>{{ client.name }}</td>
                            <td>{{ client.cpf }}</td>
                            <td>{{ client.phone }}</td>
                            <td class="text-center">
                                <button class="btn btn-danger btn-sm" type="button" @click="remove(client)">
                                    <i class="fas fa-trash"></i> 
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div v-else>
                <Message :loading="false" message="Nenhum registro encontrado" typeMessage="warning"/>
            </div>
        </div>
    </div>
</template>

<script>
import Message from '../components/Message.vue';
import SaveClient from '../components/SaveClient.vue';
import {mask} from 'vue-the-mask';
export default {
    directives: {mask},
    data() {
        return {
            clients: [],
            loading: false,
            typeMessage: null,
            message: null,
            name: null,
            cpf: null,
        };
    },
    methods: {
        clear(){
            this.name = null;
            this.cpf = null;
            this.get();
        },
        stored(message){
            this.message = message;
            this.typeMessage = 'success';
            this.get();
            var modalElement = document.getElementById('add_client_modal');
            var modal = bootstrap.Modal.getInstance(modalElement)
            modal.hide();
        },
        remove(client){
            this.loading = true;
            this.typeMessage = null;
            this.message = null;
            this.axios
                .delete("http://localhost:8000/api/clientes/"+client.id)
                .then((response) => {
                    if (response.data.success) {
                        this.message = response.data.message;
                        this.loading = false;
                        this.typeMessage = 'success';
                        this.get();
                    }
                }).catch((error) => {
                    this.message = error.response.data.message;
                    this.loading = false;
                    this.typeMessage = 'danger';
                });

        },
        get(){
            let search = {};
            if(this.name){
                search.name = this.name;
            }
            if(this.cpf){
                search.cpf = this.cpf;
            }

            this.axios
                .get("http://localhost:8000/api/clientes", { params: search})
                .then((response) => {
                    if (response.data.success) {
                        this.clients = response.data.data;
                    }
                });
        }
    },
    created() {
        this.get();
    },
    components: {
        Message,
        SaveClient
    }
};
</script>