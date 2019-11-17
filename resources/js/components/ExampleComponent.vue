<template>
  <div>
    <div class="row p-0 m-0">
      <div class="col-2 text-center text-success p-0" style="font-size:3em">{{ correct_total }}</div>
      <div class="col-8 text-center p-0">sdfg</div>
      <div class="col-2 text-center text-danger p-0" style="font-size:3em">{{ wrong_total }}</div>
    </div>
    
    <div style="font-size: 5em; " class="border text-center">{{ number_one + ' x ' + number_two }}</div>

    <table
      class="table table-bordered text-center w-100"
      style="font-size:3em; bottom: 0; left:0; position: absolute"
    >
      <tr>
        <td :id="numbers['number_1']" @click="confere(numbers['number_1'])">
          <span v-if="cards != ''">{{ numbers['number_1'] }}</span>
        </td>
        <td :id="numbers['number_2']" @click="confere(numbers['number_2'])">
          <span v-if="cards != ''">{{ numbers['number_2'] }}</span>
        </td>
        <td :id="numbers['number_3']" @click="confere(numbers['number_3'])">
          <span v-if="cards != ''">{{ numbers['number_3'] }}</span>
        </td>
      </tr>
      <tr>
        <td :id="numbers['number_4']" @click="confere(numbers['number_4'])">
          <span v-if="cards != ''">{{ numbers['number_4'] }}</span>
        </td>
        <td :id="numbers['number_5']" @click="confere(numbers['number_5'])">
          <span v-if="cards != ''">{{ numbers['number_5'] }}</span>
        </td>
        <td :id="numbers['number_6']" @click="confere(numbers['number_6'])">
          <span v-if="cards != ''">{{ numbers['number_6'] }}</span>
        </td>
      </tr>
      <tr>
        <td :id="numbers['number_7']" @click="confere(numbers['number_7'])">
          <span v-if="cards != ''">{{ numbers['number_7'] }}</span>
        </td>
        <td :id="numbers['number_8']" @click="confere(numbers['number_8'])">
          <span v-if="cards != ''">{{ numbers['number_8'] }}</span>
        </td>
        <td :id="numbers['number_9']" @click="confere(numbers['number_9'])">
          <span v-if="cards != ''">{{ numbers['number_9'] }}</span>
        </td>
      </tr>
    </table>
  </div>
</template>

<script>
export default {
  data: function() {
    return {
      cards: [
      '2', '4', '6', '8', '10', '12', '14', '16', '18', '20', '3', '6', '9', '12', '15', '18', '21', '24', '27', '30',
      '4', '8', '12', '16', '20', '24', '28', '32', '36', '40', '5', '10', '15', '20', '25', '30', '35', '40', '45', '50',
      '6', '12', '18', '24', '30', '36', '42', '48', '54', '60', '7', '14', '21', '28', '35', '42', '49', '56', '63', '70',
      '8', '16', '24', '32', '40', '48', '56', '64', '72', '80', '9', '18', '27', '36', '45', '54', '63', '72', '81', '90'
      ],
      number_one: Math.floor(Math.random() * (9 - 2 + 1)) + 2,
      number_two: Math.floor(Math.random() * (9 - 2 + 1)) + 2,
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
      correct_number: "",
      correct_total: "0",
      wrong_total: "0",
      already_picked: [],
      aleatorio : ''
    };
  },
  props: ["userId"],
  beforeMount() {
  },
  mounted() {
    this.sortCards();
  },
  methods: {
    sortCards() {
      this.number_one = Math.floor(Math.random() * (9 - 2 + 1)) + 2;
      this.number_two = Math.floor(Math.random() * (9 - 2 + 1)) + 2;
      this.correct_number = this.number_one * this.number_two;
      this.already_picked = []
       this.already_picked.push(String(this.correct_number));
       console.log(this.already_picked)
      for (let i = 1; i <= 9; i++) {
        do {
          this.aleatorio = this.cards[Math.floor(Math.random() * 79)];
          
        } while (this.already_picked.indexOf(this.aleatorio) !== -1);
        this.already_picked.push(this.aleatorio);

        if (i == 1) {
          this.numbers['number_1'] = this.aleatorio;
        }
        if (i == 2) {
          this.numbers['number_2'] = this.aleatorio;
        }
        if (i == 3) {
          this.numbers['number_3'] = this.aleatorio;
        }
        if (i == 4) {
          this.numbers['number_4'] = this.aleatorio;
        }
        if (i == 5) {
          this.numbers['number_5'] = this.aleatorio;
        }
        if (i == 6) {
          this.numbers['number_6'] = this.aleatorio;
        } 
        if (i == 7) {
          this.numbers['number_7'] = this.aleatorio;
        }
        if (i == 8) {
          this.numbers['number_8'] = this.aleatorio;
        }
        if (i == 9) {
          this.numbers['number_9'] = this.aleatorio;
        }
          
      }
      this.numbers['number_' + (Math.floor(Math.random() * (9 - 1 + 1)) + 1)] = this.correct_number
    },
    confere(number) {
      if (number == this.correct_number) {
        document.getElementById(number).className = "bg-success";

        setTimeout(() => {
          if (document.getElementsByClassName("bg-success")[0]) {
            document
              .getElementsByClassName("bg-success")[0]
              .classList.remove("bg-success");
          }
          if (document.getElementsByClassName("bg-danger")[0]) {
            document
              .getElementsByClassName("bg-danger")[0]
              .classList.remove("bg-danger");
          }

          this.sortCards();
        }, 1000);
        this.correct_total++;
        this.setUserCards(number, true);
      } else {
        document.getElementById(number).className = "bg-danger";

        setTimeout(() => {
          if (document.getElementsByClassName("bg-success")[0]) {
            document
              .getElementsByClassName("bg-success")[0]
              .classList.remove("bg-success");
          }
          if (document.getElementsByClassName("bg-danger")[0]) {
            document
              .getElementsByClassName("bg-danger")[0]
              .classList.remove("bg-danger");
          }
          this.sortCards();
        }, 1000);

        this.wrong_total++;
        this.setUserCards(number, false);
      }
      document.getElementById(this.correct_number).className = "bg-success";
    },
    setUserCards(number, bool) {
      axios
        .post("/api/cards", {
          card: number
        })
        .then(response => {
          if (response.status == 200) {
          }
        });
    },
  }
};
</script>
