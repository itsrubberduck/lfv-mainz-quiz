const { createApp } = Vue;

createApp({
    data() {
        return {
            name: '',
            questions: [],
            currentIndex: 0,
            answers: {},
            scores: [],
            result: null,
            screen: 'start',
            loading: false,
            error: '',
            startTime: 0,
            now: Date.now(),
            timer: null,
            medals: ['🥇', '🥈', '🥉'],
        };
    },
    computed: {
        currentQuestion() {
            return this.questions[this.currentIndex] || null;
        },
        progress() {
            if (!this.questions.length) {
                return 0;
            }
            return ((this.currentIndex + 1) / this.questions.length) * 100;
        },
        formattedLiveTime() {
            if (!this.startTime) {
                return '00:00';
            }
            return this.formatTime(this.now - this.startTime);
        },
    },
    mounted() {
        this.loadScores();
    },
    beforeUnmount() {
        this.stopTimer();
    },
    methods: {
        async startQuiz() {
            if (!this.name) {
                return;
            }

            this.loading = true;
            this.error = '';
            this.result = null;

            try {
                const response = await fetch('index.php?action=questions', {
                    headers: { Accept: 'application/json' },
                });
                const data = await response.json();

                if (!response.ok) {
                    throw new Error(data.error || 'Quiz konnte nicht geladen werden.');
                }

                this.questions = data.questions;
                this.currentIndex = 0;
                this.answers = {};
                this.screen = 'quiz';
                this.startTime = Date.now();
                this.now = this.startTime;
                this.startTimer();
            } catch (error) {
                this.error = error.message;
            } finally {
                this.loading = false;
            }
        },
        selectAnswer(index) {
            this.answers[this.currentQuestion.id] = index;
        },
        async nextQuestion() {
            if (this.currentIndex < this.questions.length - 1) {
                this.currentIndex++;
                return;
            }

            await this.submitQuiz();
        },
        async submitQuiz() {
            this.loading = true;
            this.error = '';
            this.stopTimer();
            const timeMs = Date.now() - this.startTime;

            try {
                const response = await fetch('index.php?action=submit', {
                    method: 'POST',
                    headers: {
                        Accept: 'application/json',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        name: this.name,
                        answers: this.answers,
                        timeMs,
                    }),
                });
                const data = await response.json();

                if (!response.ok) {
                    throw new Error(data.error || 'Ergebnis konnte nicht gespeichert werden.');
                }

                this.result = data.result;
                this.scores = data.scores;
                this.screen = 'result';
                this.confetti();
            } catch (error) {
                this.error = error.message;
                this.screen = 'quiz';
                this.startTimer();
            } finally {
                this.loading = false;
            }
        },
        async loadScores() {
            try {
                const response = await fetch('index.php?action=scores', {
                    headers: { Accept: 'application/json' },
                });
                const data = await response.json();
                this.scores = data.scores || [];
            } catch (error) {
                this.error = 'Highscore konnte nicht geladen werden.';
            }
        },
        startTimer() {
            this.stopTimer();
            this.timer = window.setInterval(() => {
                this.now = Date.now();
            }, 250);
        },
        stopTimer() {
            if (this.timer) {
                window.clearInterval(this.timer);
                this.timer = null;
            }
        },
        formatTime(ms) {
            const totalSeconds = Math.max(0, Math.floor(ms / 1000));
            const minutes = String(Math.floor(totalSeconds / 60)).padStart(2, '0');
            const seconds = String(totalSeconds % 60).padStart(2, '0');
            return `${minutes}:${seconds}`;
        },
        confetti() {
            const colors = ['#00ADEF', '#1A2B6D', '#FFFFFF'];
            for (let index = 0; index < 42; index++) {
                const piece = document.createElement('span');
                piece.className = 'confetti-piece';
                piece.style.left = `${Math.random() * 100}vw`;
                piece.style.background = colors[index % colors.length];
                piece.style.setProperty('--drift', `${(Math.random() * 160) - 80}px`);
                piece.style.animationDelay = `${Math.random() * 180}ms`;
                document.body.appendChild(piece);
                window.setTimeout(() => piece.remove(), 1200);
            }
        },
    },
}).mount('#app');
