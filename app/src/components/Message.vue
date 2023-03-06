<template>
        <div :class="'alert alert-'+typeMessage" role="alert">
            <div v-if="loading" class="text-center">
                <i class="fas fa-spinner fa-spin fa-3x"></i>
            </div>
            {{ message }}
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