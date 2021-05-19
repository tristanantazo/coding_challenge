<template>
    <div class="button-wrapper">
        <button @click="runClicked">
            <img src="/assets/loader.gif" alt="" v-if="loading">
            <span v-else>{{label}}</span>
        </button>
    </div>
</template>

<script>
export default {
    props: ['label', 'onClick', 'data'],
    data: function() {
        return {
            loading: false
        }
    },
    methods: {
        async runClicked(){
            this.loading = true
            let run =  await this.onClick('sample')
            this.loading = false
        }
    }
}
</script>

<style lang="scss" scoped>
    .button-wrapper {
        button{
            background-color: #0095ff;
            border: none;
            font-size: 18px;
            padding: 10px;
            color: white;
            border-radius: 5px;
            img{
                width: 50px;
                height: 12px;
            }
        }
    }
</style>