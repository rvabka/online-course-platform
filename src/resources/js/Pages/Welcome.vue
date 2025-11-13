<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { Instagram, Facebook, Twitter, Linkedin } from "lucide-vue-next";
import Navigation from "@/Components/Navigation.vue";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Welcome" />
    <div class="SiteContainer">
        <Navigation
            :canLogin="canLogin"
            :canRegister="canRegister"
            :user="$page.props.auth.user"
        />

        <div class="heroSection">
            <!-- Background decorations -->
            <div class="bgDecoration">
                <div class="circle circle1"></div>
                <div class="circle circle2"></div>
                <div class="circle circle3"></div>
                <div class="wave wave1"></div>
                <div class="wave wave2"></div>
            </div>

            <!-- LEFT BLOCK -->
            <div class="leftBlock">
                <div class="middleText">
                    <p>Inspiring</p>
                    <p>Education</p>
                    <p>Exploration</p>
                </div>

                <div class="spacer">
                    <div class="spacer1"></div>
                    <div class="spacer2"></div>
                    <div class="spacer3"></div>
                    <div class="spacer4"></div>
                    <div class="spacer5"></div>
                </div>

                <div class="description">
                    <h3>
                        Kursy dla STUDENTÓW wszystkich kierunków medycznych.<br />
                        Sprawdzone informacje w jednym miejscu.<br />
                        Quizy i fiszki po których po prostu nie możesz nie zaliczyć!
                    </h3>
                </div>

                <Link v-if="canRegister" href="/register" class="ctaButton">
                    Getting Started
                </Link>

                <div class="stats">
                    <div class="statItem">
                        <h1>99K+</h1>
                        <p>Studentów</p>
                    </div>
                    <div class="statItem">
                        <h1>1K+</h1>
                        <p>Kursów</p>
                    </div>
                </div>
            </div>

            <!-- RIGHT BLOCK -->
            <div class="rightBlock">
                <!-- Image -->
                <div class="imageSection">
                    <img src="/EduCool.svg" alt="Education Image" class="heroImage" />

                    <!-- Desktop only: Floating Card & Categories -->
                    <div class="floatingCard desktop-only">
                        <div class="cardHeader">
                            <div class="iconWrapper">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="black">
                                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                                </svg>
                            </div>
                            <h2>Kursy dla<br />Studentów</h2>
                        </div>
                        <p class="cardText">
                            Zbiór wszystkich potrzebnych materiałów edukacyjnych dla studentów - W jednym miejscu
                        </p>
                    </div>

                    <div class="categories desktop-only">
                        <button class="categoryBtn yellow">Pielęgniarstwo</button>
                        <button class="categoryBtn white offset">Stomatologia</button>
                        <button class="categoryBtn white">Medycyna</button>
                        <button class="categoryBtn white small">Farmacja</button>
                    </div>
                </div>

                <!-- Mobile only: Categories -->
                <div class="categories mobile-only">
                    <button class="categoryBtn yellow">Pielęgniarstwo</button>
                    <button class="categoryBtn white">Stomatologia</button>
                    <button class="categoryBtn white">Medycyna</button>
                    <button class="categoryBtn white">Farmacja</button>
                </div>

                <!-- Mobile only: Floating Card -->
                <div class="floatingCard mobile-only">
                    <div class="cardHeader">
                        <div class="iconWrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="black">
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                            </svg>
                        </div>
                        <h2>Kursy dla<br />Studentów</h2>
                    </div>
                    <p class="cardText">
                        Zbiór wszystkich potrzebnych materiałów edukacyjnych dla studentów - W jednym miejscu
                    </p>
                </div>

                <!-- Social Section -->
                <div class="socialSection">
                    <p class="socialText">Mamy ponad 1 kurs online do wypróbowania!</p>
                    <div class="socialIcons">
                        <div class="socialIcon">
                            <Instagram :size="22" color="black" />
                        </div>
                        <div class="socialIcon">
                            <Facebook :size="22" color="black" />
                        </div>
                        <div class="socialIcon">
                            <Twitter :size="22" color="black" />
                        </div>
                        <div class="socialIcon">
                            <Linkedin :size="22" color="black" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.heroSection {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    padding: 2rem clamp(2rem, 8vw, 8rem);
    height: calc(100vh - 7vh);
    align-items: center;
    overflow: hidden;
    position: relative;
}

/* Background Decorations */
.bgDecoration {
    position: absolute;
    inset: 0;
    z-index: 0;
    overflow: hidden;
    pointer-events: none;
}

.circle {
    position: absolute;
    border-radius: 50%;
    opacity: 0.08;
}

.circle1 {
    width: 400px;
    height: 400px;
    background: linear-gradient(135deg, #2ac676 0%, #1ea05f 100%);
    top: -100px;
    right: -100px;
    animation: float 20s ease-in-out infinite;
}

.circle2 {
    width: 300px;
    height: 300px;
    background: linear-gradient(135deg, #ffeb3b 0%, #ffc107 100%);
    bottom: -80px;
    left: -80px;
    animation: float 15s ease-in-out infinite reverse;
}

.circle3 {
    width: 200px;
    height: 200px;
    background: linear-gradient(135deg, #000000 0%, #424242 100%);
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    animation: pulse 10s ease-in-out infinite;
}

.wave {
    position: absolute;
    width: 200%;
    height: 200px;
    opacity: 0.05;
}

.wave1 {
    bottom: 0;
    left: -50%;
    background: linear-gradient(90deg, transparent 0%, #2ac676 25%, transparent 50%, #2ac676 75%, transparent 100%);
    animation: wave 25s linear infinite;
}

.wave2 {
    top: 0;
    right: -50%;
    background: linear-gradient(90deg, transparent 0%, #ffeb3b 25%, transparent 50%, #ffeb3b 75%, transparent 100%);
    animation: wave 30s linear infinite reverse;
}

@keyframes float {
    0%, 100% { transform: translateY(0px) translateX(0px); }
    25% { transform: translateY(-30px) translateX(20px); }
    50% { transform: translateY(-50px) translateX(0px); }
    75% { transform: translateY(-30px) translateX(-20px); }
}

@keyframes pulse {
    0%, 100% { transform: translate(-50%, -50%) scale(1); opacity: 0.08; }
    50% { transform: translate(-50%, -50%) scale(1.2); opacity: 0.12; }
}

@keyframes wave {
    0% { transform: translateX(0); }
    100% { transform: translateX(50%); }
}

/* LEFT BLOCK */
.leftBlock {
    display: flex;
    flex-direction: column;
    gap: 2rem;
    max-width: 650px;
    position: relative;
    z-index: 1;
}

.middleText {
    font-family: "lufga";
    font-size: clamp(2.5rem, 5vw, 5.5rem);
    font-weight: bold;
    line-height: 1.1;
    color: #000000;
}

.spacer {
    height: clamp(40px, 6vh, 70px);
    width: 100%;
    max-width: 350px;
    display: flex;
    gap: 5px;
    align-items: center;
}

.spacer1, .spacer5 {
    height: 60%;
    width: 30%;
    background-color: #000;
    border-radius: 15px;
}

.spacer2, .spacer4 {
    height: 55%;
    width: 15%;
    background-color: #2ac676;
    border-radius: 15px;
}

.spacer3 {
    height: 50%;
    width: 6%;
    background-color: #000;
    border-radius: 15px;
}

.description h3 {
    font-family: "lufga";
    font-size: clamp(0.95rem, 1.15vw, 1.25rem);
    font-weight: 400;
    line-height: 1.6;
    color: rgb(60, 60, 60);
}

.ctaButton {
    height: 50px;
    width: fit-content;
    padding: 0 2.2rem;
    border: 1px solid black;
    background-color: #2ac676;
    border-radius: 25px;
    font-family: "lufga";
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0.25rem 0.25rem 0 0 rgba(0, 0, 0, 1);
    text-decoration: none;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    color: #000;
}

.ctaButton:hover {
    transform: translate(-2px, -2px);
    box-shadow: 0.5rem 0.5rem 0 0 rgba(0, 0, 0, 1);
}

.stats {
    display: flex;
    gap: 2.5rem;
    margin-top: 0.5rem;
}

.statItem h1 {
    font-size: clamp(2rem, 3vw, 3.5rem);
    font-weight: bold;
    margin-bottom: 0.3rem;
    color: #000;
}

.statItem p {
    color: rgb(95, 94, 94);
    font-size: clamp(0.95rem, 1.1vw, 1.3rem);
}

/* RIGHT BLOCK */
.rightBlock {
    position: relative;
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
    height: 100%;
    z-index: 1;
}

.mobile-only {
    display: none;
}

.imageSection {
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    flex: 1;
}

.heroImage {
    height: clamp(350px, 60vh, 600px);
    width: 100%;
    max-width: 500px;
    object-fit: contain;
}

.floatingCard {
    border: 2px solid #000;
    min-height: 160px;
    padding: 1.2rem;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
    border-top-right-radius: 15px;
    box-shadow: 0.2rem 0.2rem 0 0 rgba(0, 0, 0, 1);
    background-color: white;
    transition: all 0.3s ease;
    cursor: pointer;
}

.floatingCard.desktop-only {
    position: absolute;
    bottom: 0%;
    right: -20px;
    width: clamp(240px, 22vw, 320px);
    transform: rotate(-2deg);
    z-index: 10;
}

.floatingCard:hover {
    transform: translate(-2px, -2px) rotate(0deg);
    box-shadow: 0.4rem 0.4rem 0 0 rgba(0, 0, 0, 1);
}

.cardHeader {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 0.8rem;
}

.iconWrapper {
    height: 55px;
    width: 55px;
    min-width: 55px;
    display: flex;
    border-radius: 100%;
    border: 1px solid #000;
    background-color: yellow;
    justify-content: center;
    align-items: center;
    box-shadow: 0.25rem 0.25rem 0 0 rgba(0, 0, 0, 1);
}

.iconWrapper svg {
    width: 38px;
    height: 38px;
}

.cardHeader h2 {
    font-family: "lufga";
    font-size: clamp(1rem, 1.1vw, 1.25rem);
    font-weight: 600;
    color: #000;
}

.cardText {
    font-family: "lufga";
    font-size: clamp(0.85rem, 0.95vw, 1.05rem);
    color: rgb(95, 94, 94);
    line-height: 1.5;
}

.categories {
    display: flex;
    gap: 1.4rem;
}

.categories.desktop-only {
    position: absolute;
    right: -30px;
    top: 8%;
    flex-direction: column;
}

.categoryBtn {
    border: 1px solid black;
    border-radius: 25px;
    font-family: "lufga";
    font-weight: 400;
    font-size: clamp(0.9rem, 1.05vw, 1.15rem);
    height: 52px;
    padding: 0 1.5rem;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0.15rem 0.15rem 0 0 rgba(0, 0, 0, 1);
    color: #000;
}

.categoryBtn.yellow {
    background-color: yellow;
}

.categoryBtn.white {
    background-color: white;
}

.desktop-only .categoryBtn.yellow {
    width: clamp(160px, 12vw, 200px);
}

.desktop-only .categoryBtn.white {
    width: clamp(150px, 11vw, 190px);
}

.desktop-only .categoryBtn.offset {
    margin-left: 40px;
}

.desktop-only .categoryBtn.small {
    width: clamp(130px, 10vw, 170px);
    align-self: center;
}

.categoryBtn:hover {
    transform: translate(-2px, -2px);
    box-shadow: 0.5rem 0.5rem 0 0 rgba(0, 0, 0, 1);
}

.socialSection {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    padding: 0 2rem 1rem;
}

.socialText {
    font-family: "lufga";
    font-size: clamp(1.05rem, 1.3vw, 1.45rem);
    font-weight: normal;
    color: #000;
}

.socialIcons {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
}

.socialIcon {
    height: 52px;
    width: 52px;
    border-radius: 100%;
    border: 1px solid #000;
    background-color: rgb(253, 253, 253);
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0.25rem 0.25rem 0 0 rgba(0, 0, 0, 1);
    cursor: pointer;
    transition: all 0.3s ease;
}

.socialIcon:hover {
    transform: translate(-2px, -2px);
    box-shadow: 0.5rem 0.5rem 0 0 rgba(0, 0, 0, 1);
}

/* Mobile Responsiveness */
@media (max-width: 1024px) {
    .heroSection {
        grid-template-columns: 1fr;
        gap: 2rem;
        padding: 1.5rem;
        height: auto;
        min-height: calc(100vh - 7vh);
        overflow: visible;
    }

    .leftBlock {
        max-width: 100%;
        align-items: center;
        text-align: center;
        gap: 1.5rem;
    }

    .rightBlock {
        align-items: center;
        gap: 1.5rem;
    }

    .spacer {
        align-self: center;
    }

    .stats {
        justify-content: center;
    }

    .desktop-only {
        display: none !important;
    }

    .mobile-only {
        display: flex;
    }

    .categories.mobile-only {
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
        gap: 0.8rem;
        width: 100%;
    }

    .mobile-only .categoryBtn {
        height: 45px;
        font-size: 0.9rem;
        width: auto;
        min-width: 140px;
    }

    .floatingCard.mobile-only {
        width: 100%;
        max-width: 400px;
        min-height: 140px;
        padding: 1rem;
        transform: none;
    }

    .imageSection {
        width: 100%;
    }

    .heroImage {
        height: clamp(250px, 40vh, 350px);
        max-width: 350px;
    }

    .iconWrapper {
        height: 50px;
        width: 50px;
        min-width: 50px;
    }

    .iconWrapper svg {
        width: 35px;
        height: 35px;
    }

    .socialSection {
        align-items: center;
        text-align: center;
        padding: 0;
    }

    .socialIcons {
        justify-content: center;
    }

    .circle1 {
        width: 300px;
        height: 300px;
        top: -50px;
        right: -50px;
    }

    .circle2 {
        width: 250px;
        height: 250px;
        bottom: -50px;
        left: -50px;
    }

    .circle3 {
        width: 150px;
        height: 150px;
    }
}

@media (max-width: 768px) {
    .description h3 br,
    .cardText br {
        display: none;
    }

    .floatingCard.mobile-only {
        max-width: 350px;
        min-height: 130px;
        padding: 0.9rem;
    }

    .heroImage {
        height: clamp(220px, 35vh, 300px);
        max-width: 300px;
    }

    .socialIcon {
        height: 48px;
        width: 48px;
    }

    .mobile-only .categoryBtn {
        height: 43px;
        min-width: 130px;
        font-size: 0.88rem;
    }
}

@media (max-width: 480px) {
    .middleText {
        font-size: 2rem;
    }

    .floatingCard.mobile-only {
        max-width: 300px;
        min-height: 120px;
        padding: 0.8rem;
    }

    .heroImage {
        height: clamp(200px, 32vh, 280px);
        max-width: 280px;
    }

    .mobile-only .categoryBtn {
        height: 40px;
        font-size: 0.85rem;
        min-width: 120px;
        padding: 0 1rem;
    }

    .socialIcon {
        height: 45px;
        width: 45px;
    }

    .circle1, .circle2 {
        width: 200px;
        height: 200px;
    }

    .circle3 {
        width: 100px;
        height: 100px;
    }
}
</style>