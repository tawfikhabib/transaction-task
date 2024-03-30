<template>
    <div>
        <h3 class="text-center">Make Payment</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="makePayment">
                    <div class="form-group">
                        <label>User ID</label>
                        <input type="text" class="form-control" v-model="payment.userId">
                    </div>
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="text" class="form-control" v-model="payment.amount">
                    </div>
                    <button class="btn btn-primary mt-3">Add Payment</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                payment: {}
            }
        },
        methods: {
            makePayment() {
                this.axios
                    .post('/api/payment', this.payment)
                    .then(response => (
                        this.$router.push({name: 'home'})
                    ))
                    .catch(err => {
                        if (err.response.data.errors) {
                            console.log(err.response.data.errors);
                        }

                    })
            }
        }
    }
</script>
