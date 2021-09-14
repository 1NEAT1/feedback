<template>
  <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto">
        <div class="mb-3">
          <label class="form-label">Ваше имя</label>
          <input type="text" class="form-control" v-model="feedback.name" placeholder="Ваше имя"/>
          <div class="invalid-feedback" v-if="errors.name">{{ errors.name[0] }}</div>
        </div>
        <div class="mb-3">
          <label class="form-label">Ваш телефон</label>
          <input type="text" class="form-control" v-model="feedback.phone" placeholder="Ваш телефон"/>
          <div class="invalid-feedback" v-if="errors.phone">{{ errors.phone[0] }}</div>
        </div>
        <div class="mb-3">
          <label class="form-label">Ваше сообщение</label>
          <textarea class="form-control" v-model="feedback.message" placeholder="Ваше сообщение"/>
          <div class="invalid-feedback" v-if="errors.message">{{ errors.message[0] }}</div>
        </div>
        <button type="submit" class="btn btn-primary" @click="create">Отправить</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'FeedBack',
  data: function () {
    return {
      feedback: {
        name: '',
        phone: '',
        message: ''
      },
      errors: []
    }
  },
  methods: {
    create: function(){
      this.$store.dispatch('createFeedBack', this.feedback).then(response => {
        if(response.status){
          this.$toast.info("Заявка успешно отправлена");
          this.clear();
        }
      }).catch(error => {
        this.errors = error;
      });
    },
    clear: function(){
      this.errors = [];
      this.feedback.name = '';
      this.feedback.phone = '';
      this.feedback.message = '';
    },
  },
}
</script>
