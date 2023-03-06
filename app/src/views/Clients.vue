<template>
    <div class="clients container">
       <br>
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
                                <button class="btn btn-danger btn-sm" type="button">
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
export default {
    data() {
        return {
            clients: [],
        };
    },
    methods: {
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
    }
};
</script>