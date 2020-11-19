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

                    <div class="border-top px-3 py-2 comment-user d-flex justify-content-between">
                        <div>
                            <img src='/images/default-avatar.png' width="25px">
                            <a :href="`/profile/${comment.user.username}`" class="ml-1">
                                {{ comment.user.username}}
                            </a>
                            <span>
                                {{new Date(comment.created_at).toLocaleDateString(undefined, { year: 'numeric',day: 'numeric', month: 'long'})}}
                            </span>
                        </div>
                        <div v-if="comment.user.id === user.id">
                            <delete-modal @update-data='updatePagination' title='this comment' :data-id='comment.id' url="/comment"></delete-modal>
                        </div>
                    </div>
                </div>

                <pagination 
                    :pagination-data="paginationData" 
                    :url='url' 
                    @update-pagination='updatePagination'
                    :fetch-data='articleId'
                    totalPerPage=25
                    >
                </pagination>
            </div>
        </div>
    </div>
</template>

<script>
import DeleteModal from './DeleteModal.vue';
    export default {
        props: ['articleId', 'user'],
        data() {
            return {
                paginationData: {},
                comment: '',
                url: '/comment'
            }
        },
        methods: {
            updatePagination: function(data){
                this.paginationData = data
            },
            onSubmit: function(){
                axios.post('/comment', {comment: this.comment, articleId: this.articleId})
                    .then(({data}) => {
                        this.updatePagination(data)
                        this.comment = ''
                        })
                    .catch(err => console.log(err, 'hello'))
            }
        }
    
    };
</script>

