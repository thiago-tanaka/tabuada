<template>
  <div>
      <div class="text-success float-left" style="font-size:2em">{{ correct }}</div>
      <div class="text-danger float-right" style="font-size:2em">{{ wrong }}</div>
     <br>
    <p style="font-size: 7em" class="border text-center mt-3">{{ number_one + ' x ' + number_two }}</p>

    <table
      class="table table-bordered text-center w-100"
      style="font-size:3em; bottom: 0; left:0; position: absolute"
    >
      <tr>
        <td @click="confere(numbers['number_' + aleatorio1])">
          <span v-if="cards != ''">{{ numbers['number_' + aleatorio1] }}</span>
        </td>
        <td @click="confere(numbers['number_' + aleatorio2])">
          <span v-if="cards != ''">{{ numbers['number_' + aleatorio2] }}</span>
        </td>
        <td @click="confere(numbers['number_' + aleatorio3])">
          <span v-if="cards != ''">{{ numbers['number_' + aleatorio3] }}</span>
        </td>
      </tr>
      <tr>
        <td @click="confere(numbers['number_' + aleatorio4])">
          <span v-if="cards != ''">{{ numbers['number_' + aleatorio4] }}</span>
        </td>
        <td @click="confere(numbers['number_' + aleatorio5])">
          <span v-if="cards != ''">{{ numbers['number_' + aleatorio5] }}</span>
        </td>
        <td @click="confere(numbers['number_' + aleatorio6])">
          <span v-if="cards != ''">{{ numbers['number_' + aleatorio6] }}</span>
        </td>
      </tr>
      <tr>
        <td @click="confere(numbers['number_' + aleatorio7])">
          <span v-if="cards != ''">{{ numbers['number_' + aleatorio7] }}</span>
        </td>
        <td @click="confere(numbers['number_' + aleatorio8])">
          <span v-if="cards != ''">{{ numbers['number_' + aleatorio8] }}</span>
        </td>
        <td @click="confere(numbers['number_' + aleatorio9])">
          <span v-if="cards != ''">{{ numbers['number_' + aleatorio9] }}</span>
        </td>
      </tr>
    </table>
  </div>
</template>

<script>
export default {
  data: function() {
    return {
      cards: "",
      number_one: Math.floor(Math.random() * (9 - 2 + 1)) + 2,
      number_two: Math.floor(Math.random() * (9 - 2 + 1)) + 2,
      aleatorio1: "",
      aleatorio2: "",
      aleatorio3: "",
      aleatorio4: "",
      aleatorio5: "",
      aleatorio6: "",
      aleatorio7: "",
      aleatorio8: "",
      aleatorio9: "",
      numbers: {
        number_1: "",
        number_2: "",
        number_3: "",
        number_4: "",
        number_5: "",
        number_6: "",
        number_7: "",
        number_8: "",
        number_9: ""
      },
      corect_number: "",
      correct: '',
      wrong: ''
    };
  },
  props: ["userId"],
  beforeMount() {
    this.getUserCards();
  },
  mounted() {
      this.sortCards()
  },
  created: function() {},
  methods: {
    sortCards() {
    this.number_one = Math.floor(Math.random() * (9 - 2 + 1)) + 2
    this.number_two = Math.floor(Math.random() * (9 - 2 + 1)) + 2
    this.corect_number = this.number_one * this.number_two;
    this.numbers.number_9 = this.corect_number
      var random_numbers = [];
      var aleatorio = Math.floor(Math.random() * (9 - 1 + 1)) + 1;
      for (let i = 1; i <= 9; i++) {
        do {
          aleatorio = Math.floor(Math.random() * (9 - 1 + 1)) + 1;
        } while (random_numbers.indexOf(aleatorio) != -1);
        random_numbers.push(aleatorio);
        this.aleatorio = "asd";
        if (i == 1) {
          this.aleatorio1 = aleatorio;
        }
        if (i == 2) {
          this.aleatorio2 = aleatorio;
        }
        if (i == 3) {
          this.aleatorio3 = aleatorio;
        }
        if (i == 4) {
          this.aleatorio4 = aleatorio;
        }
        if (i == 5) {
          this.aleatorio5 = aleatorio;
        }
        if (i == 6) {
          this.aleatorio6 = aleatorio;
        }
        if (i == 7) {
          this.aleatorio7 = aleatorio;
        }
        if (i == 8) {
          this.aleatorio8 = aleatorio;
        }
        if (i == 9) {
          this.aleatorio9 = aleatorio;
        }
      }
    },
    confere(number) {
      if (number == this.corect_number) {
          this.correct++
          console.log(this.correct)
        this.setUserCards(number, true);
      } else {
          this.wrong++
          console.log(this.wrong)
        this.setUserCards(number, false);
      }
    },
    setUserCards(number, bool) {
      axios
        .post("/api/cards", {
          card: number
        })
        .then(response => {
          console.log(response);
          if (response.status == 200) {
            console.log("ok");
          }
          this.sortCards()
        });
    },
    getUserCards() {
      window.axios.get("/api/cards/?user=" + this.userId).then(({ data }) => {
        this.cards = data;
        this.corect_number = this.number_one * this.number_two;

        (this.numbers.number_1 = this.cards[Math.floor(Math.random() * 79)][
          "number"
        ]),
          (this.numbers.number_2 = this.cards[Math.floor(Math.random() * 79)][
            "number"
          ]),
          (this.numbers.number_3 = this.cards[Math.floor(Math.random() * 79)][
            "number"
          ]),
          (this.numbers.number_4 = this.cards[Math.floor(Math.random() * 79)][
            "number"
          ]),
          (this.numbers.number_5 = this.cards[Math.floor(Math.random() * 79)][
            "number"
          ]),
          (this.numbers.number_6 = this.cards[Math.floor(Math.random() * 79)][
            "number"
          ]),
          (this.numbers.number_7 = this.cards[Math.floor(Math.random() * 79)][
            "number"
          ]),
          (this.numbers.number_8 = this.cards[Math.floor(Math.random() * 79)][
            "number"
          ]),
          (this.numbers.number_9 = this.corect_number);
        console.log(this.corect_number);
      });
    }
  }
};
</script>
