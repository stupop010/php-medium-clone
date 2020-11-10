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
            <b-pagination
                v-model="currentPage"
                :total-rows="totalPages"
                :per-page="perPage"
                first-number
                last-number
            ></b-pagination>
            hello
        </div>
    </div>
</template>

<script>
    export default {
        props: ['articleId'],
        data() {
            return {
                paginationData: {},
                comment: '',
            }
        },
        methods: {
            onSubmit: function(){
                axios.post('/comment', {
                    comment: this.comment,
                    articleId: this.articleId
                }).then((res) => {
                    this.paginationData = res.data
                }).catch((err) => {
                    console.log(err)
                })
            }
        }, 
        watch: {
            currentPage(newVal, oldVal){
                console.log(newVal, oldVal)
            }
        },
        computed: {
            currentPage: {
                get(){
                    return this.paginationData.current_page;
                },
                set(value){
                    console.log(value)
                }
            }, 
            totalPages(){
                return this.paginationData.total;
            },
            perPage(){
                return this.paginationData.per_page;
            }
        }
    };
</script>

