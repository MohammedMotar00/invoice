<template>
  <v-container fluid class="d-flex justify-center">
    <v-simple-table class="mr-4 w-100">
      <template v-slot:default>
        <thead>
          <tr>
            <th><h1>Invoices</h1></th>
          </tr>
          <tr>
            <th class="text-left">Type</th>
            <th class="text-left">Account Name</th>
            <th class="text-left">Status</th>
            <th class="text-left">Currency</th>
            <th class="text-left">Balance</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="item in dataArr[0]"
            :key="item.id"
            style="cursor: pointer"
            @click="onClick(item.id)"
          >
            <td v-ripple>
              {{ item.type }}
            </td>
            <td v-ripple>
              {{ item.account_name }}
            </td>
            <td v-ripple>
              {{ item.status }}
            </td>
            <td v-ripple>
              {{ item.currency }}
            </td>
            <td v-ripple>
              {{ item.balance }}
            </td>
          </tr>
        </tbody>
      </template>
    </v-simple-table>

    <v-container class="blue">
      <div class="d-flex justify-end">
        <div
          class="white d-flex align-center justify-center"
          style="height: 50px; width: 50px"
        >
          <v-app-bar-nav-icon></v-app-bar-nav-icon>
        </div>
      </div>
      <div class="d-flex flex-column justify-center align-center">
        <div class="mb-4" :style="{ display: open ? 'block' : 'none' }">
          <v-card width="600">
            <v-img
              height="200px"
              :src="require('../img/image.png')"
              aspect-ratio="1"
            >
            </v-img>

            <div v-for="item in singleInvoice" :key="item.id">
              <v-row class="d-flex flex-wrap px-10">
                <v-col cols="12" class="">
                  <h2 class="blue--text my-3">
                    {{ item.account_name }}
                  </h2>
                </v-col>

                <div class="d-flex flex-wrap justify-content-center">
                  <v-col cols="6" class="">
                    <h5 class="grey-text--darken-3 text-bold">TYPE</h5>
                    <p>{{ item.type }}</p>
                  </v-col>

                  <v-col cols="6" class="">
                    <h5>ACCOUNT NAME</h5>
                    <p>{{ item.account_name }}</p>
                  </v-col>

                  <v-col cols="6" class="">
                    <h5>STATUS</h5>
                    <p>{{ item.status }}</p>
                  </v-col>

                  <v-col cols="6" class="">
                    <h5>CURRENCY</h5>
                    <p>{{ item.currency }}</p>
                  </v-col>

                  <v-col cols="6" class="">
                    <h5>BALANCE</h5>
                    <p>{{ item.balance }}</p>
                  </v-col>
                  <v-col cols="6">
                    <h5>NOTES</h5>
                    <p>
                      Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </p>
                  </v-col>
                </div>
              </v-row>
            </div>
          </v-card>
        </div>
        <div
          :style="{ display: open ? 'block' : 'none' }"
          class="mt-4"
          @click="open = false"
        >
          <v-icon class="white--text" style="cursor: pointer">mdi-close</v-icon>
        </div>
      </div>
    </v-container>
  </v-container>
</template>

<script>
import axios from "axios";

export default {
  name: "Invoices",
  data() {
    return {
      dataArr: [],
      singleInvoice: [],
      open: false,
      image: "../img/image.png",
    };
  },
  mounted() {
    axios("api/invoices").then((res) => {
      // console.log(res);
      this.dataArr.push(res.data);
    });
  },
  methods: {
    onClick(id) {
      axios(`api/invoice/${id}`).then((res) => {
        console.log(res.data);
        this.singleInvoice = [];
        this.singleInvoice.push(res.data);
        this.open = true;
      });
    },
  },
};
</script>

<style lang="scss" scoped>
</style>