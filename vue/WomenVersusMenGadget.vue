<template>
    <div class="gadget-women-v-men tile">
        <div
            class="relative js-gadget-wvm-step-one"
            v-show="step === 1"
        >
            <div class="row small-collapse">
                 <div class="small-12 columns gadget-women-v-men__image relative"
                 style="background-image: url('/images/women-vs-men-xlarge-desktop.jpeg')">
        
                </div>
                <div class="small-12 columns">
                    <div class="gadget-women-v-men__content relative" data-mh="wvm-height">
                        <div>
                            <h3>Women and super: the gender gap</h3>
                            <p>Do you know how the average woman's super balance compares to the average man? Most women
                                have less in their super due to the gender pay gap and because they are more likely than
                                men to have career breaks to care for children. The difference can be significant.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row small-collapse gadget-women-v-men__input-container gadget-wvm--shadow relative">
                <div class="small-11 small-centered large-12 columns">
                    <div class="gadget-women-v-men--input relative clearfix">
                        <div class="gadget-women-v-men--padding clearfix">
                            <h3>See for yourself</h3>
                            <label aria-hidden="true" class="show-for-sr" for="your-age">Your age</label>
                            <input
                                type="number"
                                placeholder="Your age"
                                class="js-gadget-wvm-age ga-wvm-age"
                                name="your-age"
                                aria-label="Your age"
                                v-model="age"
                                @change="handleAgeInput"
                                @blur="handleAgeInput"
                                @keypress="handleAgeKeypress"
                            >
                            <button
                                class="button relative js-gadget-wvm-compare ga-wvm-compare"
                                @click="showResult"
                            >
                                Compare
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="gadget-wvm__results relative clearfix js-gadget-wvm-step-two"
            v-show="step == 2"
        >
            <div class="gadget-wvm__copy-block float--left">
                <div class="row small-collapse gadget-wvm__copy-alignment">
                    <div class="small-12 columns gadget-wvm__title flex--align-center">
                        <div class="js-gadget-wvm-agespan">Average super balance for a 
                        <!-- <div class="js-gadget-wvm-agespan">Average super balance for a <span>{{age}}</span> year old</div> -->
                            <input
                                id="ageInput"
                                type="number"
                                v-model="age"
                                @blur="showResult"
                                @keypress="handleAgeKeypress"
                            > year old.</div>
                    </div>
                    <div class="small-12 columns text-center gadget-wvm__icons">
                        <div class="row small-collapse flex--align-center gadget-wvm__icons--maxwidth"
                            style="width:100%">
                            <div class="gadget-wvm__column gadget-wvm__column--women text-center">
                                <div class="gadget-wvm__icon">
                                    <img src="/images/icon-wvm-women.svg" alt="" width="70">
                                    <div
                                        class="gadget-wvm__icon-bar js-gadget-wvm-women-mask"
                                        :style="{height: womenRatio + '%'}"
                                    ></div>
                                </div>
                                <div class="gadget-wvm__number"><b
                                        class="js-gadget-wvm-women-balance">${{womenBalance}}<sup>*</sup></b></div>
                            </div>
                            <div class="gadget-wvm__column gadget-wvm__column--men text-center">
                                <div class="gadget-wvm__icon">
                                    <img src="/images/icon-wvm-men.svg" alt="" width="70">
                                    <div
                                        class="gadget-wvm__icon-bar js-gadget-wvm-men-mask"
                                        :style="{height: menRatio + '%'}"
                                    ></div>
                                </div>
                                <div class="gadget-wvm__number"><b
                                        class="js-gadget-wvm-men-balance">${{menBalance}}<sup>*</sup></b></div>
                            </div>
                            <div class="gadget-wvm__column gadget-wvm__column--copy text-center show-for-medium">
                                <div class="gadget-wvm__icons--title">The average woman's balance is <b
                                        class="js-gadget-wvm-diff-balance">${{diff}}</b> less</div>
                            </div>
                        </div>
                        <div class="row small-collapse hide-for-medium" style="width:100%">
                            <div class="small-12 column text-center">
                                <div class="gadget-wvm__icons--title">The average woman's balance is <b
                                        class="js-gadget-wvm-diff-balance">${{diff}}</b> less</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gadget-wvm__callout-block float--left relative">
                <div class="gadget-wvm--shadow">
                    <div class="gadget-wvm__callout-copy gadget-wvm__callout-block--padding">
                        It's never too early or too late to start closing the gap. Take action today to improve your
                        balance at retirement.
                        <div class="row small-collapse gadget-wvm__button-group">
                            <div class="small-12 medium-6 columns">
                                <button class="button primary ga-wvm-cta"
                                    onclick="location.href='/member/super/grow-your-super/women-and-super'">
                                    <div class="triangle"></div>
                                    Start closing the gap
                                </button>
                            </div>
                            <div class="small-12 medium-6 columns">
                                <button
                                    class="button white js-gadget-wvm-compare-again ga-wvm-compare-again"
                                    @click="step = 1"
                                >Compare again</button>
                            </div>
                        </div>
                    </div>
                    <div class="gadget-wvm__callout-triangle show-for-large"></div>
                </div>
                <div class="calloutByline text-right"><sup>*</sup> Mean superannuation balances. <a class="ga-wvm-pdf"
                        href="https://www.superannuation.asn.au/ArticleDocuments/359/1907-Better-Retirement-Outcomes-a-snapshot-of-account-balances-in-Australia.pdf.aspx?Embed=Y"
                        target="_blank" rel="noreferrer">ASFA</a></div>
            </div>
            <div class="gadget-wvm__results-triangle"></div>
        </div>
    </div>
</template>
<script>
import balanceData from './data/Balances.json'
export default {
    data(){
        return {
            step: 1,
            age: null,
            minAge: 18,
            maxAge: 85,
            menBalance: 0,
            womenBalance: 0,
            diff: 0,
            menRatio: 1,
            womenRatio: 1,
        }
    },
    methods: {
        handleAgeInput() {
            if (this.age < this.minAge) {
                this.age = this.minAge
            } else if (this.age > this.maxAge) {
                this.age = this.maxAge
            }
        },
        handleAgeKeypress(ev) {
            if (ev.which == 13) {
                this.showResult()
            }
        },
        showResult(){
            if (!this.age) {
                this.age = this.minAge
            }
            this.step = 2
            const balance = balanceData.balances.filter(item => this.age < item.age)[0]
            this.menBalance = balance.men
            this.womenBalance = balance.women
            this.diff = this.menBalance - this.womenBalance

            setTimeout(()=>{
                this.womenRatio = balance.women / balance.men * 100
                this.menRatio = 100
            }, 500)

            console.log({balance})
        },
    }
}
</script>

<style lang="scss">
@import "./public/scss/women-vs-men-gadget.scss";
#ageInput {
    display: inline-block;
    margin: 0;
    padding: 0;
    background: transparent;
    width: 21px;
    text-align: center;
    border: none;
    height: auto;
    font-size: 18px;
    border-bottom: 1px solid;
    cursor: pointer;
}
</style>
