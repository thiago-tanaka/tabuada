<template>
  <div>
    <div class="text-success float-left" style="font-size:2em">{{ correct_total }}</div>
    <div class="text-danger float-right" style="font-size:2em">{{ wrong_total }}</div>
    <br />
    <p style="font-size: 7em" class="border text-center mt-3">{{ number_one + ' x ' + number_two }}</p>

    <table
      class="table table-bordered text-center w-100"
      style="font-size:3em; bottom: 0; left:0; position: absolute"
    >
      <tr>
        <td :id="numbers['number_' + aleatorio1]" @click="confere(numbers['number_' + aleatorio1])">
          <span v-if="cards != ''">{{ numbers['number_' + aleatorio1] }}</span>
        </td>
        <td :id="numbers['number_' + aleatorio2]" @click="confere(numbers['number_' + aleatorio2])">
          <span v-if="cards != ''">{{ numbers['number_' + aleatorio2] }}</span>
        </td>
        <td :id="numbers['number_' + aleatorio3]" @click="confere(numbers['number_' + aleatorio3])">
          <span v-if="cards != ''">{{ numbers['number_' + aleatorio3] }}</span>
        </td>
      </tr>
      <tr>
        <td :id="numbers['number_' + aleatorio4]" @click="confere(numbers['number_' + aleatorio4])">
          <span v-if="cards != ''">{{ numbers['number_' + aleatorio4] }}</span>
        </td>
        <td :id="numbers['number_' + aleatorio5]" @click="confere(numbers['number_' + aleatorio5])">
          <span v-if="cards != ''">{{ numbers['number_' + aleatorio5] }}</span>
        </td>
        <td :id="numbers['number_' + aleatorio6]" @click="confere(numbers['number_' + aleatorio6])">
          <span v-if="cards != ''">{{ numbers['number_' + aleatorio6] }}</span>
        </td>
      </tr>
      <tr>
        <td :id="numbers['number_' + aleatorio7]" @click="confere(numbers['number_' + aleatorio7])">
          <span v-if="cards != ''">{{ numbers['number_' + aleatorio7] }}</span>
        </td>
        <td :id="numbers['number_' + aleatorio8]" @click="confere(numbers['number_' + aleatorio8])">
          <span v-if="cards != ''">{{ numbers['number_' + aleatorio8] }}</span>
        </td>
        <td :id="numbers['number_' + aleatorio9]" @click="confere(numbers['number_' + aleatorio9])">
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
      correct_total: "",
      wrong_total: "",
      already_picked: []
    };
  },
  props: ["userId"],
  beforeMount() {
    this.getUserCards();
  },
  mounted() {
    this.sortCards();
    this.numbers['number_' + 5] = 3
    console.log(this.numbers['number_5'],'asdfasdfasdfasdf')
  },
  created: function() {},
  methods: {
    sortCards() {
      this.number_one = Math.floor(Math.random() * (9 - 2 + 1)) + 2;
      this.number_two = Math.floor(Math.random() * (9 - 2 + 1)) + 2;
      this.corect_number = this.number_one * this.number_two;
      this.numbers.number_9 = this.corect_number;
      var random_numbers = [];
      var aleatorio = Math.floor(Math.random() * (9 - 1 + 1)) + 1;
      for (let i = 1; i <= 9; i++) {
        do {
          aleatorio = Math.floor(Math.random() * (9 - 1 + 1)) + 1;
        } while (random_numbers.indexOf(aleatorio) !== -1);
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
        document.getElementById(number).className = "bg-success";

        setTimeout(() => {
          if (document.getElementsByClassName("bg-success")[0]) {
            document
              .getElementsByClassName("bg-success")[0]
              .classList.remove("bg-success");
          }
          if (document.getElementsByClassName("bg-success")[1]) {
            document
              .getElementsByClassName("bg-success")[1]
              .classList.remove("bg-success");
          }
          if (document.getElementsByClassName("bg-success")[2]) {
            document
              .getElementsByClassName("bg-success")[2]
              .classList.remove("bg-success");
          }
          if (document.getElementsByClassName("bg-danger")[0]) {
            document
              .getElementsByClassName("bg-danger")[0]
              .classList.remove("bg-danger");
          }
          if (document.getElementsByClassName("bg-danger")[1]) {
            document
              .getElementsByClassName("bg-danger")[1]
              .classList.remove("bg-danger");
          }
          if (document.getElementsByClassName("bg-danger")[2]) {
            document
              .getElementsByClassName("bg-danger")[2]
              .classList.remove("bg-danger");
          }

          this.sortCards();
        }, 2000);
        this.correct_total++;
        console.log(this.correct_total);
        this.setUserCards(number, true);
      } else {
        document.getElementById(number).className = "bg-danger";

        setTimeout(() => {
          if (document.getElementsByClassName("bg-success")[0]) {
            document
              .getElementsByClassName("bg-success")[0]
              .classList.remove("bg-success");
          }
          if (document.getElementsByClassName("bg-success")[1]) {
            document
              .getElementsByClassName("bg-success")[1]
              .classList.remove("bg-success");
          }
          if (document.getElementsByClassName("bg-success")[2]) {
            document
              .getElementsByClassName("bg-success")[2]
              .classList.remove("bg-success");
          }
          if (document.getElementsByClassName("bg-danger")[0]) {
            document
              .getElementsByClassName("bg-danger")[0]
              .classList.remove("bg-danger");
          }
          if (document.getElementsByClassName("bg-danger")[1]) {
            document
              .getElementsByClassName("bg-danger")[1]
              .classList.remove("bg-danger");
          }
          if (document.getElementsByClassName("bg-danger")[2]) {
            document
              .getElementsByClassName("bg-danger")[2]
              .classList.remove("bg-danger");
          }
          this.sortCards();
        }, 2000);

        this.wrong_total++;
        console.log(this.wrong_total);
        this.setUserCards(number, false);
      }
      document.getElementById(this.corect_number).className = "bg-success";
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
        });
    },
    remoreFromArray(number) {
      console.log(this.numbers.number_1);
    },
    getUserCards() {
      window.axios.get("/api/cards/?user=" + this.userId).then(({ data }) => {
        this.cards = data;
        this.corect_number = this.number_one * this.number_two;

        this.already_picked.push(this.corect_number)
        
            this.numbers.number_1 = this.cards[Math.floor(Math.random() * 79)];
            this.already_picked.push(this.numbers.number_1)
            console.log(this.already_picked,'push1')
            
        while (this.numbers.number_1 != '' && this.already_picked.indexOf(this.numbers.number_1) !== -1) {
            console.log('entoru1')
          this.numbers.number_1 = this.cards[Math.floor(Math.random() * 79)];
        }
          this.already_picked.push(this.numbers.number_1)

         this.numbers.number_2 = this.cards[Math.floor(Math.random() * 79)];
            this.already_picked.push(this.numbers.number_2)
        while (this.numbers.number_2 !== '' && this.already_picked.indexOf(this.numbers.number_2) !== -1) {
              console.log('entoru2')
          this.numbers.number_2 = this.cards[Math.floor(Math.random() * 79)];
        }
          this.already_picked.push(this.numbers.number_2)

         this.numbers.number_3 = this.cards[Math.floor(Math.random() * 79)];
            this.already_picked.push(this.numbers.number_3)
        while (this.numbers.number_3 !== '' && this.already_picked.indexOf(this.numbers.number_3) !== -1) {
              console.log('entoru3')
          this.numbers.number_3 = this.cards[Math.floor(Math.random() * 79)];
        }
          this.already_picked.push(this.numbers.number_3)

         this.numbers.number_4 = this.cards[Math.floor(Math.random() * 79)];
            this.already_picked.push(this.numbers.number_4)
        while (this.numbers.number_4 !== '' && this.already_picked.indexOf(this.numbers.number_4) !== -1) {
              console.log('entoru4')
          this.numbers.number_4 = this.cards[Math.floor(Math.random() * 79)];
        }
          this.already_picked.push(this.numbers.number_4)

         this.numbers.number_5 = this.cards[Math.floor(Math.random() * 79)];
            this.already_picked.push(this.numbers.number_5)
        while (this.numbers.number_5 !== '' && this.already_picked.indexOf(this.numbers.number_5) !== -1) {
              console.log('entoru5')
          this.numbers.number_5 = this.cards[Math.floor(Math.random() * 79)];
        }
          this.already_picked.push(this.numbers.number_5)

         this.numbers.number_6 = this.cards[Math.floor(Math.random() * 79)];
            this.already_picked.push(this.numbers.number_6)
        while (this.numbers.number_6 !== '' && this.already_picked.indexOf(this.numbers.number_6) !== -1) {
              console.log('entoru6')
          this.numbers.number_6 = this.cards[Math.floor(Math.random() * 79)];
        }
          this.already_picked.push(this.numbers.number_6)

         this.numbers.number_7 = this.cards[Math.floor(Math.random() * 79)];
            this.already_picked.push(this.numbers.number_7)
        while (this.numbers.number_7 !== '' && this.already_picked.indexOf(this.numbers.number_7) !== -1) {
              console.log('entoru7')
          this.numbers.number_7 = this.cards[Math.floor(Math.random() * 79)];
        }
          this.already_picked.push(this.numbers.number_7)

         this.numbers.number_8 = this.cards[Math.floor(Math.random() * 79)];
            this.already_picked.push(this.numbers.number_8)
        while (this.numbers.number_8 !== '' && this.already_picked.indexOf(this.numbers.number_8) !== -1) {
              console.log('entoru8')
          this.numbers.number_8 = this.cards[Math.floor(Math.random() * 79)];
        }
          this.already_picked.push(this.numbers.number_8)
          this.already_picked = []


        //  this.numbers.number_9 = this.cards[Math.floor(Math.random() * 79)];
        //     this.already_picked.push(this.numbers.number_9)
        // while (this.numbers.number_9 != '' && this.already_picked.indexOf(this.numbers.number_9) != -1) {
        //   this.numbers.number_9 = this.cards[Math.floor(Math.random() * 79)];
        // }
        //   this.numbers.number_2 = this.cards[Math.floor(Math.random() * 79)]
        //   this.numbers.number_3 = this.cards[Math.floor(Math.random() * 79)]
        //   this.numbers.number_4 = this.cards[Math.floor(Math.random() * 79)]
        //   this.numbers.number_5 = this.cards[Math.floor(Math.random() * 79)]
        //   this.numbers.number_6 = this.cards[Math.floor(Math.random() * 79)]
        //   this.numbers.number_7 = this.cards[Math.floor(Math.random() * 79)]
        //   this.numbers.number_8 = this.cards[Math.floor(Math.random() * 79)]
          this.numbers.number_9 = this.corect_number
          console.log(this.already_picked)

      });
    }
  }
};
</script>
