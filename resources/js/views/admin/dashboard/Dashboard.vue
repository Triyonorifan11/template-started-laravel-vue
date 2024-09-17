<template>
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <h1>dashboard</h1>
    </div>
    <!--end::Main-->
</template>

<script>


export default {
    data() {
        return {           
        }
    },
    validations() {
       
    },
    methods: {
        showHidePassword() {
            this.hidePassword = !this.hidePassword
        },
        
    },
    computed: {

    },
    mounted() {
        this.$initializeAppPlugins();
    },
}

</script>

<style scoped>
.icon-password {
    cursor: pointer;
    float: right;
    position: relative;
    bottom: 32px;
    right: 10px;
    font-size: 20px;
}

.form-check.form-check-solid .form-check-input:checked {
    background-color: #EE7B33 !important;
}
</style>