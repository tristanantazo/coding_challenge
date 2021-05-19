<template>
    <div class="event-date-container">
        <div class="date-wrapper">
            <div v-for="(value, name, key) in value" :key="key">
                <label :for="name">{{value.label}}:</label>
                <input type="date" :id="name" :name="name" @input="updateValue(name, $event.target.value)" :value="value.value">
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['value'],
    methods: {
        updateValue(key, v) {
            this.$emit('input', { ...this.value, [key]: {
                        ...this.value[key],
                        value:v
                    } 
                })
            },
        },
}
</script>

<style lang="scss" scoped>
    .event-date-container {
        .date-wrapper {
            display: flex;
        }
        label {
            display: block;
        }
        input {            
            height: 35px;
            width: 195px;
            border: 1px solid #9e9e9e;
            border-radius: 5px;
            margin: 10px 10px 20px 0px;
        }
    }
</style>