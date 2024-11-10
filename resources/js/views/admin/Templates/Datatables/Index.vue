<template>
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Row-->
            <div class="row g-5 g-xl-8">
                <div class="col-xl-12">
                    <!--begin::Statistics Widget 5-->
                    <div class="card">
                        <div class="card-header pb-5">
                            <div class="flex-column">
                                <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">Roles Data</div>
                                <div class="fw-bold text-gray-400">Berikut adalah data role aplikasi <span class="text-primary">Bimbel-Ku</span></div>
                            </div>
                            <div class="card-toolbar">
                                <!--begin::Toolbar-->
                                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                    <!--begin::Filter-->
                                    <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Filter</button>
                                    <!--begin::Menu 1-->
                                    <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                                        <!--begin::Header-->
                                        <div class="px-7 py-5">
                                            <div class="fs-5 text-dark fw-bolder">Filter Options</div>
                                        </div>
                                        <!--end::Header-->
                                        <!--begin::Separator-->
                                        <div class="separator border-gray-200"></div>
                                        <!--end::Separator-->
                                        <!--begin::Content-->
                                        <div class="px-7 py-5" data-kt-user-table-filter="form">
                                            <!--begin::Input group-->
                                            <div class="mb-10">
                                                <label class="form-label fs-6 fw-bold">Role:</label>
                                                <select class="form-select form-select-solid fw-bolder" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="role" data-hide-search="true">
                                                    <option></option>
                                                    <option value="Administrator">Administrator</option>
                                                    <option value="Analyst">Analyst</option>
                                                    <option value="Developer">Developer</option>
                                                    <option value="Support">Support</option>
                                                    <option value="Trial">Trial</option>
                                                </select>
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-10">
                                                <label class="form-label fs-6 fw-bold">Two Step Verification:</label>
                                                <select class="form-select form-select-solid fw-bolder" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="two-step" data-hide-search="true">
                                                    <option></option>
                                                    <option value="Enabled">Enabled</option>
                                                </select>
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Actions-->
                                            <div class="d-flex justify-content-end">
                                                <button type="reset" class="btn btn-light btn-active-light-primary fw-bold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
                                                <button type="submit" class="btn btn-primary fw-bold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
                                            </div>
                                            <!--end::Actions-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--begin::Body-->
                        <div class="card-body">
                            <app-datatable :table_config="tableConfig" @change-page="getDataTable"
                                v-model:show_per_page="tableConfig.config.show_per_page"
                                v-model:search="tableConfig.config.search" v-model:order="tableConfig.config.order"
                                v-model:sort_by="tableConfig.config.sort_by"
                                v-model:current_page="tableConfig.config.current_page">
                                <template v-slot:body>
                                    <tr v-for="(context, index) in tableConfig.feeder.data">
                                        <td class="text-center">
                                            {{ index + ((parseInt(tableConfig.config.show_per_page) *
                                                (parseInt(tableConfig.config.current_page) - 1))) + 1 }}
                                        </td>
                                        <td class="text-left">{{ context.name }}</td>
                                        <td class="text-center">
                                            <div class="text-center w-100">
                                                <div
                                                    class="form-check form-switch form-check-custom form-check-solid justify-content-center">
                                                    <input class="form-check-input h-20px w-40px form-check-success"
                                                        type="checkbox" :checked="context.isActive"
                                                        @click="changeStatus(context.id)" />
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
    
                                            <button class="btn btn-secondary btn-xs" type="button"
                                                @click="edit(context.id)" style="padding:5px 10px !important;">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11.9607 6.08099L6.38415 11.9767C6.21888 12.1514 5.98897 12.2504 5.74846 12.2504L3.20857 12.2504C2.72532 12.2504 2.33357 11.8587 2.33357 11.3754L2.33357 8.81313C2.33357 8.58585 2.422 8.36749 2.58015 8.20426L8.21459 2.38886C8.55085 2.0418 9.1048 2.03304 9.45187 2.36931C9.45518 2.37251 9.45847 2.37575 9.46172 2.37901L11.9437 4.861C12.2787 5.19601 12.2862 5.73679 11.9607 6.08099Z"
                                                        fill="#7E8299" />
                                                </svg>&ensp; Edit
    
                                            </button>
                                        </td>
                                    </tr>
                                </template>
                            </app-datatable>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Statistics Widget 5-->
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</template>

<script>

import Api from "@/services/api";

export default {
    data() {
        return {
            ROLE: 'ADMIN',
            tableConfig: {
                feeder: {
                    column: [{
                        text: 'No',
                        sort_column: false,
                        style: 'text-align: center;width:8%',
                    },
                    {
                        text: 'Role Name',
                        sort_by: 'name',
                        sort_column: true,
                        style: 'text-align: left',
                    },
                    {
                        text: 'Status',
                        sort_by: 'is_active',
                        sort_column: false,
                        style: 'text-align: center',
                    },
                    {
                        text: 'Action',
                        sort_column: false,
                        style: 'text-align: center;width:15%',
                    },
                    ],

                    data: [],
                },
                config: {
                    title: 'Datatable',
                    show_per_page: 10,
                    search: '',
                    order: 'desc',
                    sort_by: 'id',
                    total_data: 0,
                    current_page: 1,
                    loading: false,
                    show_search: true,
                    to: 0,
                    from: 0,
                }
            }
        }
    },
    validations() {

    },
    methods: {
        getDataTable() {
            this.tableConfig.config.loading = true;
            this.tableConfig.feeder.data = [{
                id: 1,
            }];

            let params = {
                page: this.tableConfig.config.current_page,
                limit: this.tableConfig.config.show_per_page,
                search: this.tableConfig.config.search,
                sort_by: this.tableConfig.config.sort_by,
                order_by: this.tableConfig.config.order,
            }

            Api().get(`${this.$prefix('api-web')}roles`, {
                params
            })
                .then(response => {
                    let data = response.data.data.data;

                    this.tableConfig.feeder.data = data;
                    this.tableConfig.config.total_data = response.data.data.total;
                    this.tableConfig.config.from = response.data.data.from;
                    this.tableConfig.config.to = response.data.data.to;
                    
                    this.tableConfig.config.loading = false;
                })
                .catch(error => {
                    
                    this.tableConfig.config.loading = false;
                    
                    this.tableConfig.feeder.data = [];
                    this.tableConfig.config.total_data = 0;
                    this.tableConfig.config.from = 0;
                    this.tableConfig.config.to = 0;

                    this.$axiosHandleError(error);
                });
        },
    },
    computed: {

    },
    mounted() {
        this.$initializeAppPlugins();
        this.getDataTable()
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
    background-color: var(--bs-success) !important;
}
</style>