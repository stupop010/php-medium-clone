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
            <div class="text-center py-3" v-if='!paginationData.data'>
                <b-spinner label="Spinning"></b-spinner>
            </div>

            <div> 
                <div v-for="comment in paginationData.data" :key="comment.id" class="border rounded my-2">
                    <div class="p-3">
                        {{ comment.comment }}
                    </div>

                    <div class="border-top px-3 py-1">
                        {{ comment.comment }}
                    </div>
                </div>

                <pagination 
                    :pagination-data="paginationData" 
                    :url='url' 
                    @update-pagination='updatePagination'
                    :fetch-data='articleId'>
                </pagination>
            </div>
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
                url: '/comment'
            }
        },
        methods: {
            updatePagination: function(data, loading){
                this.paginationData = data
            },
        }
    
    };
</script>

