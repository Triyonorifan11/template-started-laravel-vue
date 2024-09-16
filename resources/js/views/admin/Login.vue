<template>
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
            :style="`background-image: url('${$assetUrl()}media/illustrations/sketchy-1/14.png')`">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <!--begin::Logo-->
                <a href="../../demo1/dist/index.html" class="mb-12">
                    <img alt="Logo" :src="`${$assetUrl()}media/logos/logo-1.svg`" class="h-40px" />
                </a>
                <!--end::Logo-->
                <!--begin::Wrapper-->
                <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    <!--begin::Form-->
                    <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="#">
                        <!--begin::Heading-->
                        <div class="text-center mb-10">
                            <!--begin::Title-->
                            <h1 class="text-dark mb-3">Sign In to Metronic</h1>
                            <!--end::Title-->
                            <!--begin::Link-->
                            <div class="text-gray-400 fw-bold fs-4">New Here?
                                <a href="../../demo1/dist/authentication/flows/basic/sign-up.html"
                                    class="link-primary fw-bolder">Create an Account</a>
                            </div>
                            <!--end::Link-->
                        </div>
                        <!--begin::Heading-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-6">
                            <label class="form-label fs-6 text-gray-500"
                                :class="v$.single.username.$error ? 'text-danger' : ''">Username</label>
                            <input v-model="single.username" class="form-control form-control-lg" type="text"
                                id="username" autocomplete="off" @keyup.enter="login" />
                            <div v-if="v$.single.username.$error" class="text-danger"> Username tidak boleh kosong!
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-6">
                            <div class="d-flex flex-stack justify-content-between mb-2 align-items-center">
                                <label class="form-label text-gray-500 fs-6 mb-0"
                                    :class="v$.single.password.$error ? 'text-danger' : ''">Password</label>
                            </div>
                            <input v-model="single.password" @keyup.enter="login" class="form-control form-control-lg"
                                :type="hidePassword ? 'password' : 'text'" id="password" autocomplete="off" />
                            <i id="icon-password" class="icon-password" @click="showHidePassword"
                                :class="hidePassword ? 'fa fa-eye' : 'fa fa-eye-slash'"></i>
                            <div v-if="v$.single.password.$error" class="text-danger"> Panjang minimal 6 karakter!
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-5 mb-3">
                            <vue-recaptcha ref="recaptcha" :sitekey="RECAPTCHA_APIKEY" @verify="verifyMethod"
                                @expired="expiredMethod"></vue-recaptcha>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="text-center">
                            <!--begin::Submit button-->
                            <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                                <span class="indicator-label">Continue</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <!--end::Submit button-->
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
            <!--begin::Footer-->
            <div class="d-flex flex-center flex-column-auto p-10">
                <!--begin::Links-->
                <div class="d-flex align-items-center fw-bold fs-6">
                    <a href="https://keenthemes.com" class="text-muted text-hover-primary px-2">About</a>
                    <a href="mailto:support@keenthemes.com" class="text-muted text-hover-primary px-2">Contact</a>
                    <a href="https://1.envato.market/EA4JP" class="text-muted text-hover-primary px-2">Contact Us</a>
                </div>
                <!--end::Links-->
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
    <!--end::Main-->
</template>

<script>
import {
    VueRecaptcha
} from 'vue-recaptcha';
import Api from "@/services/api";
import useVuelidate from '@vuelidate/core'
import {
    required,
    minLength
} from '@vuelidate/validators'
import globalConfig from '../../config/config';

export default {
    components: { VueRecaptcha },
    data() {
        return {
            // bg_login: this.$assetUrl() + 'extends/img/bg-login.png',
            RECAPTCHA_APIKEY: globalConfig.captcha_apikey,
            v$: useVuelidate(),
            pageStatus: 'standby',
            disabledButton: false,
            hidePassword: true,
            single: {
                username: '',
                password: '',
                captcha: ''
            }
        }
    },
    validations() {
        return {
            single: {
                username: {
                    required
                },
                password: {
                    required,
                    minLength: minLength(6)
                }
            },
        }
    },
    methods: {
        showHidePassword() {
            this.hidePassword = !this.hidePassword
        },
        verifyMethod(response) {
            this.single.captcha = response;
        },
        expiredMethod() {
            this.single.captcha = '';
        },

        login() {

            if (!this.single.captcha) {
                return false;
            }
            this.v$.$touch();
            if (this.v$.$error) {
                return false;
            }

            if (this.disabledButton) {
                return false;
            }

            this.pageStatus = "form-login";
            this.disabledButton = true;

            let formData = {
                username: this.single.username,
                password: this.single.password,
                recaptcha: this.single.captcha
            }

            Api().post('login', formData)
                .then(response => {
                    this.$store.commit('profile/SET_PROFILE_DATA', null);
                    localStorage.setItem('access_token', response.data.data.token.access_token);

                    let roleID = response.data.data.user.id_role;


                })
                .catch(error => {
                    grecaptcha.reset()
                    this.single.captcha = '';
                    this.disabledButton = false;
                    this.pageStatus = "standby";
                    if (error.response && error.response.status == 404) {
                        this.$swal({
                            title: "Oopss...",
                            icon: "error",
                            text: 'User tidak ditemukan/password salah/tidak aktif',
                            showCancelButton: false,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Ok",
                        });
                    } else {
                        this.$axiosHandleError(error);
                    }
                });
        }
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