<template>
    <div class="row text-muted align-items-center">
        <span class="col text-secondary">
            <hr style="opacity: 1;">
        </span>
        <span class="col-auto">{{ title }}</span>
        <span class="col text-secondary">
            <hr style="opacity: 1;">
        </span>
    </div><br />
</template>

<script>
export default {
    props: {
        title: {
            required: false,
            type: String,
        }
    }
}
</script>