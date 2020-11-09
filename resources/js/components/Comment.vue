<template>
    <div>
        <div class="p-4 border rounded-top">

            <form class="d-flex flex-column" id='comment-form' @submit.prevent="onSubmit()">
                <textarea placeholder="Write a comment..." name='comment' rows="3" class="p-2" v-model="comment"></textarea>
                <div class="align-self-end">
                    <button class="comment-btn" type='submit'>Post Comment</button>
                </div>
            </form>

        </div>

        <div>
            hello
        </div>
    </div>
</template>

<script>
    export default {
        props: ['articleId'],
        data(){
            return {
                comment: ''
            }
        },
        methods: {
            onSubmit: function(){
                axios.post('/comment', {
                    comment: this.comment,
                    articleId: this.articleId
                }).then((res) => {
                    console.log(res)
                }).catch((err) => {
                    console.log(err)
                })
            }
        }
    };
</script>