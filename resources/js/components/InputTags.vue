<template>
    <form @submit.prevent="onSubmit()">
        <div class="form-group">
            <input
                id="title"
                type="text"
                class="form-control form-control-lg @error('title') is-invalid @enderror"
                name="title"
                placeholder="Article title"
                autocomplete="text"
                v-model="article.title"
                required
                autofocus
            />
            <!-- 
      @error('title')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror -->
        </div>

        <div class="form-group">
            <input
                id="subject"
                type="text"
                class="form-control form-control-md @error('subject') is-invalid @enderror"
                name="subject"
                placeholder="What's this article about?"
                autocomplete="text"
                v-model="article.subject"
                required
                autofocus
            />

            <!-- @error('subject')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror -->
        </div>

        <div class="form-group">
            <textarea
                id="body"
                type="text"
                class="form-control form-control-md @error('body') is-invalid @enderror"
                name="body"
                placeholder="Write your article (in markdown)"
                v-model="article.body"
                required
                autofocus
            ></textarea>
            <!-- 
      @error('body')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror -->
        </div>

        <div class="form-group">
            <input
                id="tags"
                type="text"
                class="form-control"
                name="tags"
                placeholder="Enter tags"
                autocomplete="text"
                @keypress.enter.prevent="handleTagChange"
                v-model="tag"
            />
        </div>
        <button class="btn btn-lg btn-primary" type="submit">submit</button>
    </form>
    <!--  @change="" -->
</template>

<script>
export default {
    data() {
        return {
            article: {
                title: "",
                body: "",
                subject: ""
            },
            tag: "",
            articleTags: []
        };
    },
    methods: {
        handleTagChange: function(e) {
            this.articleTags.push(e.target.value);
            this.tag = "";
        },
        onSubmit: function() {
            axios
                .post("/editor", {
                    ...this.article,
                    articleTags: this.articleTags
                })
                .then(res => console.log(res))
                .catch(err => console.log(err));
        }
    }
};
</script>
