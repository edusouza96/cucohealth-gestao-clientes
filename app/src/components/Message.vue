<template>
        <div :class="'alert alert-'+typeMessage" role="alert">
            <div v-if="loading" class="text-center">
                <i class="fas fa-spinner fa-spin fa-3x"></i>
            </div>
            <ul v-if="typeof message === 'object'">
                <li v-for="(item, index) in message" :key="index">{{ item[0] }}</li>
            </ul>

            <p v-else>{{ message }}</p>
        </div>
</template>

<script>
export default {
    props:{
        message: { default: '' },
        typeMessage: { default: '' },
        loading: { default: false },
    },
}
</script>