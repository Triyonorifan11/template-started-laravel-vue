<script setup>
import _ from "lodash";

import {
    ref,
    computed,
    onMounted
} from 'vue'

const props = defineProps({
    table_config: {
        type: Object,
        required: true,
    },
    table_class: {
        type: String,
        required: false,
        default: ''
    },
    table_style: {
        type: String,
        required: false,
        default: ''
    },
    search: {
        type: String,
    },
    show_per_page: {
        type: Number,
    },
    order: {
        type: String,
    },
    sort_by: {
        type: String,
    },
    current_page: {
        type: Number
    }
})

const emit = defineEmits(['change-page', 'update:search', 'update:show_per_page', 'update:order', 'update:sort_by',
    'update:current_page'
])

const head = ref([])

const maxVisibleButtons = ref(5);

const data = computed(() => props.table_config.feeder.data)

const total_pages = computed(() => {
    return Math.ceil(props.table_config.config.total_data / props.table_config.config.show_per_page);
});

const startPage = computed(() => {
    if (props.table_config.config.current_page == 1) {
        return 1;
    }

    if (props.table_config.config.current_page == total_pages.value) {
        return Number(total_pages.value) - (maxVisibleButtons.value - 1);
    }

    // When inbetween
    return props.table_config.config.current_page - 1;
});

const pages = computed(() => {
    const range = [];

    for (let x = Number(startPage.value); x <= Math.min(Number(startPage.value) + maxVisibleButtons
        .value - 1, Number(total_pages.value)); x++) {
        if (x > 0) {
            range.push({
                name: x,
                isDisabled: x === props.table_config.config.current_page
            });
        }

    }

    return range;
})

const isInFirstPage = computed(() => {
    return props.table_config.config.current_page === 1;
})

const isInLastPage = computed(() => {
    return props.table_config.config.current_page == total_pages.value;
});


onMounted(() => {
    head.value = props.table_config.feeder.column;
});

function changeShowPerPage($event) {
    emit('update:current_page', 1);
    emit("update:show_per_page", $event.target.value)
    emit('change-page')
}

const changeSearch = _.debounce(($event) => {
    emit('update:current_page', 1);
    emit("update:search", $event.target.value)
    emit('change-page')
}, 1000);

function sort(sort_by, sort_column) {
    if (props.table_config.config.loading === true) {
        return false;
    }

    if (sort_column) {
        let order = '';
        if (sort_by == props.table_config.config.sort_by) {
            if (props.table_config.config.order == 'asc')
                order = 'desc';
            else if (props.table_config.config.order == 'desc')
                order = 'asc';
            else
                order = 'asc';
        } else {
            order = 'asc';
        }
        emit('update:current_page', 1);
        emit("update:sort_by", sort_by)
        emit("update:order", order)
        emit('change-page')
    }
}


function changePage(page) {
    emit('update:current_page', page)
    emit('change-page')
}

function onClickFirstPage() {
    changePage(1);

}

function onClickPreviousPage() {
    changePage(props.table_config.config.current_page - 1);

}

function onClickPage(page) {
    changePage(page);
}

function onClickNextPage() {
    changePage(props.table_config.config.current_page + 1);
}

function onClickLastPage() {
    changePage(total_pages.value);
}
</script>

<template>
    <div class="datatable-component">
        <div class="row" style="overflow-x:hidden !important;">

            <div class="col-lg-12 row">
                <div class="col-auto" style="margin-bottom:15px">
                    <div class="w-100 d-flex align-items-center"
                        style="max-width:250px;border:1px #e4e6ef solid;background:#fff;border-radius: 5px;">
                        <span class="svg-icon svg-icon-3 svg-icon-gray-500" style="margin-left:15px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                    transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                                <path
                                    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                    fill="currentColor"></path>
                            </svg>
                        </span>
                        <input type="text" id="update-search" class="form-control form-control-solid"
                            @input="changeSearch"
                            style="background:#fff;border:0  !important;outline: none !important;box-shadow:unset !important"
                            :value="props.table_config.config.search" placeholder="Search" autocomplete="off">

                    </div>
                </div>
                <div class="col row" style="margin-bottom:15px">
                    <slot name="additional-option"></slot>
                </div>
            </div>
            <div class="col-md-12 table-bar" style="overflow-x:auto !important;padding:0 !important">
                <table class="custom-vue-datatable table align-middle table-row-bordered table-striped fs-6 gy-5" :style="props.table_style" :class="props.table_class">
                    <thead>
                        <tr>
                            <th v-for="(headx, idx) in head" :key="idx" :style="headx.style"
                                @click="sort(headx.sort_by, headx.sort_column)"
                                :colspan="headx.colspan ? headx.colspan : 1"
                                :rowspan="headx.rowspan ? headx.rowspan : 1" :class="headx.class">
                                <span v-html="headx.text"></span>&nbsp;
                                <template v-if="headx.sort_column !== false">
                                    <i v-if="props.table_config.config.sort_by == headx.sort_by && props.table_config.config.order == 'asc'"
                                        class="fa fa-fw fa-sort-amount-up"></i>
                                    <i v-else-if="props.table_config.config.sort_by == headx.sort_by && props.table_config.config.order == 'desc'"
                                        class="fa fa-fw fa-sort-amount-down"></i>
                                    <i v-else class="fa fa-fw fa-sort disabled"></i>
                                </template>
                            </th>
                        </tr>

                        <template v-if="props.table_config.config.colspan">
                            <slot name="colspan_rowspan"></slot>
                        </template>
                    </thead>

                    <tbody>
                        <template v-if="props.table_config.config.loading">
                            <tr>
                                <td :colspan="head.length"
                                    style="text-align: center; font-size: 9pt; color: #b5b5b5; padding-top: 50px; padding-bottom: 50px;">
                                    <div class="lds-ring">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                </td>
                            </tr>
                        </template>

                        <template v-else-if="data.length">
                            <slot name="body"></slot>
                        </template>

                        <template v-else>
                            <tr>
                                <td :colspan="head.length" style="text-align: center; font-size: 9pt; color: #b5b5b5;">
                                    <div style="margin-top: 10px;margin-bottom:10px;">
                                        No data found here.
                                    </div>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>

            <div class="col-md-12 footer-bar">
                <div style="margin-bottom:15px;">
                    <select :value="props.table_config.config.show_per_page" class="select-show-per-page-datatable"
                        @change="changeShowPerPage($event)">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <span class="text-muted ms-3">
                        Showing {{ props.table_config.config.from }} to {{props.table_config.config.to}} of {{ props.table_config.config.total_data }} records
                    </span>
                </div>
                <ul class="custom-vue-datatable-pagination">
                    <!-- <li>
                        <button type="button" class="btn-prev-next-datatable" @click="onClickFirstPage"
                            :disabled="isInFirstPage || props.table_config.config.loading || props.table_config.config.total_data == 0">
                            <i class="fa fa-arrow-left"></i>
                        </button>
                    </li> -->

                    <li>
                        <button type="button" class="btn-prev-next-datatable" @click="onClickPreviousPage"
                            :disabled="isInFirstPage || props.table_config.config.loading">
                            <i class="fa fa-chevron-left"></i>
                        </button>
                    </li>

                    <li v-for="page in pages" :key="page.name">
                        <button type="button"
                            :class="props.table_config.config.current_page == page.name ? 'active' : ''"
                            @click="onClickPage(page.name)"
                            :disabled="page.isDisabled || props.table_config.config.loading || props.table_config.config.total_data == 0">
                            {{ page.name }}
                        </button>
                    </li>

                    <li>
                        <button type="button" class="btn-prev-next-datatable" @click="onClickNextPage"
                            :disabled="isInLastPage || props.table_config.config.loading || props.table_config.config.total_data == 0">
                            <i class="fa fa-chevron-right"></i>
                        </button>
                    </li>

                    <!-- <li>
                        <button type="button" class="btn-prev-next-datatable" @click="onClickLastPage"
                            :disabled="isInLastPage || props.table_config.config.loading || props.table_config.config.total_data == 0">
                            <i class="fa fa-arrow-right"></i>
                        </button>
                    </li> -->
                </ul>
            </div>
        </div>
    </div>
</template>

<style scoped>
.lds-ring {
    /* change color here */
    color: #00d0ff;
}

.lds-ring,
.lds-ring div {
    box-sizing: border-box;
}

.lds-ring {
    display: inline-block;
    position: relative;
    width: 80px;
    height: 80px;
}

.lds-ring div {
    box-sizing: border-box;
    display: block;
    position: absolute;
    width: 64px;
    height: 64px;
    margin: 8px;
    border: 8px solid currentColor;
    border-radius: 50%;
    animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
    border-color: currentColor transparent transparent transparent;
}

.lds-ring div:nth-child(1) {
    animation-delay: -0.45s;
}

.lds-ring div:nth-child(2) {
    animation-delay: -0.3s;
}

.lds-ring div:nth-child(3) {
    animation-delay: -0.15s;
}

@keyframes lds-ring {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }
}


.datatable-component .footer-bar {
    display: flex;
    margin-top: 15px;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
}

.datatable-component .custom-vue-datatable-pagination {
    display: flex;
    flex-wrap: wrap;
    list-style-type: none;
    margin-bottom: 15px;
}

.datatable-component .custom-vue-datatable-pagination button {
    padding: 10px;
    background-color: #fff !important;
    border: 0 !important;
    width: 35px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 5px;
    height: 35px;
}

.datatable-component .custom-vue-datatable-pagination button.btn-prev-next-datatable {
    background: #F7F9FB !important;
    border-radius: 8px !important;
}

.datatable-component .custom-vue-datatable-pagination button.active {
    background: var(--bs-primary) !important;
    border-radius: 8px;
    color: #fff !important;
}

.datatable-component .custom-vue-datatable {
    width: 100%;
}

.datatable-component .custom-vue-datatable thead tr th {
    border-bottom: 1px #eaebed solid !important;
    padding: 15px 5px;
    color: #3F4254;
    font-size: 16px;
    font-weight: 600 !important;
    cursor: pointer;
}

.datatable-component .custom-vue-datatable tbody tr td {
    border-bottom: 1px #eaebed solid !important;
    padding: 15px 5px;
}

.datatable-component .select-show-per-page-datatable {
    width: 65px;
    cursor: pointer;
    outline: none !important;
    box-shadow: unset !important;
    height: 40px;
    color: #5E6278 !important;
    background-color: #F5F8FA;
    border: 0 !important;
    border-radius: 5px;
    padding: 5px;
}

.custom-vue-datatable {
    min-width: 600px;
}
</style>