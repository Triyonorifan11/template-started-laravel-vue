import moment from 'moment'
import 'moment/dist/locale/id';
import Swal from "sweetalert2";

export default {
    install(app, options) {
        app.config.globalProperties.$formatBytes = (bytes, decimals=2) => {
                if (!+bytes) return '0 Bytes'

                const k = 1024
                const dm = decimals < 0 ? 0 : decimals
                const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB']

                const i = Math.floor(Math.log(bytes) / Math.log(k))

                return `${parseFloat((bytes / Math.pow(k, i)).toFixed(dm))} ${sizes[i]}`
            },
            app.config.globalProperties.$moment = moment,
            app.config.globalProperties.$baseUrl = () => {
                return baseUrl;
            },
            app.config.globalProperties.$assetUrl = () => {
                return assetUrl;
            },
            app.config.globalProperties.$noNullable = (text) => {
                if (text) {
                    return text;
                }
                return '-';
            },
            app.config.globalProperties.$rupiahFormat = (text) => {
                if (!text) {
                    return '0';
                }
                return new Intl.NumberFormat("id-ID", {
                    maximumFractionDigits: 5
                }).format(text);
            },
            app.config.globalProperties.$axiosHandleError = (error, callback = null) => {
                let res = error.response ? error.response.data.status : null;
                let code = error.response ? error.response.status : null;

                if (code == 400) {
                    Swal.fire({
                        title: "Oopss...",
                        icon: "error",
                        text: res ? res.message : 'Terjadi kesalahan server',
                        showCancelButton: false,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Ok",
                    }).then((result) => {
                        if (callback) {
                            callback;
                        }
                    });
                } else if (code == 403) {
                    localStorage.clear();
                    window.location.replace(baseUrl + '/login');
                } else if (code == 401) {
                    localStorage.clear();
                    window.location.replace(baseUrl + '/login');
                } else if (code == 422) {
                    Swal.fire({
                        title: "Oopss...",
                        icon: "error",
                        text: res ? res.message : 'Terjadi kesalahan server',
                        showCancelButton: false,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Ok",
                    }).then((result) => {
                        if (callback) {
                            callback;
                        }
                    });
                } else if (code == 404) {
                    Swal.fire({
                        title: "Oopss...",
                        icon: "error",
                        text: "Request/Resource not found!",
                        showCancelButton: false,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Ok",
                    }).then((result) => {
                        if (callback) {
                            callback;
                        }
                    });
                } else {
                    Swal.fire({
                        title: "Oopss...",
                        icon: "error",
                        text: "Terjadi kesalahan koneksi",
                        showCancelButton: false,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Ok",
                    }).then((result) => {
                        if (callback) {
                            callback;
                        }
                    });
                }


            },
            app.config.globalProperties.$loadingShow = () => {
                var loadingDiv = `<div class="box-loader">
                                    <span class="loader"></span>
                                </div>`

                $('body').append(loadingDiv);
            },
            app.config.globalProperties.$loadingHide = (error) => {
                $('.box-loader').hide();
            },
            (app.config.globalProperties.$initializeAppPlugins = (error) => {
                window.$(".drawer-overlay").remove();
                setTimeout(() => {
                    KTDialer.init();
                    KTDrawer.init();
                    KTImageInput.init();
                    KTMenu.createInstances();
                    KTPasswordMeter.init();
                    KTScroll.init();
                    KTScrolltop.init();
                    KTSticky.init();
                    KTSwapper.init();
                    KTToggle.init();
                    // KTAppCalendar.init();
                    KTUtil.onDOMContentLoaded(function () {
                        KTApp.init();
                    }),
                        window.addEventListener("load", function () {
                            KTApp.initPageLoader();
                        }),
                        "undefined" != typeof module &&
                            void 0 !== module.exports &&
                            (module.exports = KTApp);

                    KTUtil.onDOMContentLoaded(function () {
                        KTLayoutAside.init();
                    });

                    KTUtil.onDOMContentLoaded(function () {
                        KTLayoutSearch.init();
                    });

                    KTUtil.onDOMContentLoaded(function () {
                        KTLayoutToolbar.init();
                    });
                }, 100);

                setTimeout(() => {
                    $("body").attr("data-kt-drawer-aside", "off");
                    $("body").attr("data-kt-drawer", "off");
                    $("body").attr("data-kt-aside-minimize", "off");

                    $(".drawer-overlay").remove();
                }, 10);

                window.$("#kt_aside_mobile_toggle").on("click", function () {
                    setTimeout(() => {
                        $(".drawer-overlay").each(function () {
                            let checkLength = $(".drawer-overlay").length;

                            if (checkLength > 1) {
                                $(this).remove();
                            }
                        });
                    }, 10);
                });
            }),
            /**
             * @param type is api or api-web
             */
            (app.config.globalProperties.$prefix = (type) => {
                if (type == "api") {
                    return "api/";
                } else {
                    return "api-web/";
                }
            })
    }
};
