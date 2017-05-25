var app = new Vue({
  el: '#invoice',
  data: {
    form: {},
    errors: {}
  },
  created: function () {
    Vue.set(this.$data, 'form', _form);
  },
  methods: {
    addLine: function() {
      this.form.products.push({name: '', price: 0, qty: 1});
    },
    remove: function(product) {
      this.form.products.$remove(product);
    },
  computed: {
    subTotal: function() {
      return this.form.products.reduce(function(carry, product) {
        return carry + (parseFloat(product.qty) * parseFloat(product.price));
      }, 0);
    },
    grandTotal: function() {
      return (this.subTotal +(this.subTotal*(parseFloat(this.form.discount)/100)));
    }

  }
})
