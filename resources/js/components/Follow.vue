<template>
    <div class="follow-heart" @click="handleClick">
        <i class="fas fa-heart"></i> {{articleId}}
    </div>
</template>

<script>
    export default {
        props: ['articleId'],
        data: function(){
            return {
                count: 0
            }
        },
        mounted: function(){
            console.log(this)
            this.count = this.articleId
        },
        methods: {
            handleClick: function(){
                axios.post('/follow', { articleId: this.articleId })
                    .then(res => console.log(res))
                    .catch(err =>console.log(err))
            }
        }
    };
</script>