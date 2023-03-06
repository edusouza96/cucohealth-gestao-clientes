<template>
    <div class="clients container">
        <div class="row">
            <div class="col-12 text-end my-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_client_modal">
                    <i class="fas fa-plus"></i> 
                    Adicionar
                </button>
            </div>
        </div>
        
        <SaveClient @stored="stored"/>
        <Message :message="message" :typeMessage="typeMessage" :loading="loading"/>

        <div class="row">
            <div class="table-responsive">
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
        </div>
    </div>
</template>

<script>
import Message from '../components/Message.vue';
import SaveClient from '../components/SaveClient.vue';
export default {
    data() {
        return {
            clients: [],
            loading: false,
            typeMessage: null,
            message: null,
        };
    },
    methods: {
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
            this.axios
                .get("http://localhost:8000/api/clientes")
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