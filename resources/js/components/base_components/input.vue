<template>
    <div class="input-wrapper">
        <label :for="input_id">{{label}}</label>
        <input type="text" :id="input_id" :value="value" @input="$emit('input', $event.target.value)">
    </div>
</template>

<script>
export default {
    props: ['label', 'input_id', 'value'],
}
</script>

<style lang="scss" scoped>
    .input-wrapper {
        label {
            display: block;
        }
        input {
            height: 35px;
            width: 400px;
            border: 1px solid #9e9e9e;
            border-radius: 5px;
            margin: 10px 0px 20px 0px;
        }
    }
</style>