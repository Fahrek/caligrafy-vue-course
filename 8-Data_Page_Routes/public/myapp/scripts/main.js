var app = new Vue({
  el: '#app',
  data () {
    return {
        env: env,
        apiRoute: env.home + 'api/',
        projects: null,
        config: {
            async: true,
            crossDomain: true,
            headers: {
                "Authorization": "Bearer " + apiKey,
                'Content-Type': 'application/json',
                 'Set-Cookie': 'widget_session=caligrafy_app; SameSite=None; Secure'
                }
        }

    }
  },
  /* Method Definition  */
  methods: {
      
      // API get call using axios
      all: function(route) {
          axios.get(route, this.config)
              .then(response => (this.projects = response.data.projects))
              .catch(error => (console.log(error)));
      }
      
  },
  /* upon object load, the following will be executed */
  mounted () {
      this.all(this.apiRoute);
  }

});