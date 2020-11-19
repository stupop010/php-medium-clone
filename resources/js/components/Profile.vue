<template>
    <div>
        <div v-for="article in articlesData" :key="article.id" class="article-preview py-4">
            
            <div class="d-flex justify-content-between article-meta">
                <div class="d-flex">
                    <img src="/images/default-avatar.png" alt='Default avatar' width='35px' />
                    <div class="ml-2">
                        <a :href="`/profile/${article.user.username}`">{{article.user.username}}</a>
                        <span class='d-block'> {{new Date(article.created_at).toLocaleDateString(undefined, { year: 'numeric',day: 'numeric', month: 'long'})}}</span>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div>
                        <follow :article-id="article.id" :follow-count="article.follow_count" />
                    </div>

                    <div class="ml-1" v-if="article.user.id === user.id">
                        <delete-modal @update-data='updateArticles' :data-id="article.id" :title="article.title" :url='`/article/${article.slug}`'></delete-modal>
                    </div>
                </div>
            </div>

            <a :href='`/article/${article.slug}`'>
                <div class="my-3">
                    <h2 class="m-0">{{ article.title }}</h2>
                    <p>{{ article.subject }}</p>
                </div>
            </a>

            <div class="d-flex justify-content-between article-footer">
                <a :href='`/article/${article.slug}`'>read more...</a>
                <div>
                    <a v-for="tag in article.tag" :key="tag.id" :href='`/?tag=${tag.tag}`'>
                        <span>{{tag.tag}}</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        props: ['articles', 'user'],
        data: function(){
            return {    
                articlesData: []
            }
        },
        mounted: function(){
            this.articlesData = JSON.parse(this.articles)
            },
        methods: {
            updateArticles: function(articles){
                this.articlesData = articles
            }
        }
    };
</script>



