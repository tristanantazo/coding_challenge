<template>
    <div class="checkbox-wrapper">
        <input type="checkbox" :id="checkbox_id" v-bind:checked="value" @change="$emit('change', $event.target.checked)">
        <label :for="checkbox_id">{{label}}</label>
    </div>
</template>

<script>
export default {
    props: ['checkbox_id', 'label', 'value'],
    model: {
        prop: 'value',
        event: 'change'
    },
}
</script>

<style lang="scss" scoped>
    .checkbox-wrapper {
        margin-right: 8px;
    }
</style>