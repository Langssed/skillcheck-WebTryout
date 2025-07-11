<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
  {{-- Tailwind --}}
  @vite('resources/css/app.css')
  <script src="https://unpkg.com/feather-icons"></script>
  <title>Question</title>
  <style>
    .animate-fade-in {
      animation: fadeIn 0.5s ease-out both;
    }
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: scale(0.98);
      }
      to {
        opacity: 1;
        transform: scale(1);
      }
    }
  </style>
</head>
<body class="bg-teal-50">
  <section id="question" class="flex w-full h-[100vh] justify-center items-center">
    <div class="md:w-1/2 w-4/5" id="question-content">
      {{-- Ada di Script --}}
    </div>
  </section>

  <script>
    const questions = @json($questions);

    let currentIndex = 0;
    let answers = new Array(questions.length).fill(null);
    let correctAnswers = new Array(questions.length).fill(null);
    const questionContent = document.getElementById('question-content');

    function renderQuestion(index) {
      const q = questions[index];
      if (!q) return;

      questionContent.innerHTML = `
        <div class="mb-8">
          <!-- Info Soal -->
          <h1 class="md:text-4xl text-2xl text-slate-800 font-bold mb-2">${q.level.name}</h1>
          <h2 class="md:text-2xl text-xl text-teal-500 font-semibold">${q.subject.name}</h2>
          <h3 class="md:text-xl text-lg text-slate-700 mt-1 font-mono">Kategori: ${q.category.name}</h3>

          <!-- Top Bar -->
          <div class="w-full mt-6">
            <div class="flex justify-between items-center">
              <p class="text-slate-700 md:text-base text-sm">${index + 1} dari ${questions.length}</p>

              <div class="relative group flex items-center gap-1 cursor-pointer text-red-700 font-semibold text-sm md:text-base" id="score-rules">
                <span>Aturan Score</span>
                <i data-feather="info" class="w-4 h-4"></i>
                <div id="score-container" class="absolute top-full right-0 mt-2 z-10 hidden group-hover:flex flex-col bg-red-50 border border-red-800 text-sm rounded-xl shadow px-4 py-3 w-52 transition-all duration-200">
                  <p class="text-red-800 font-medium">✅ Benar = +1</p>
                  <p class="text-red-800 font-medium">❌ Salah = 0</p>
                  <p class="text-red-800 font-medium">⛔ Tidak Jawab = -1</p>
                </div>
              </div>
            </div>

            <!-- Progress Bar -->
            <div class="w-full bg-slate-200 h-[6px] rounded-full mt-2 overflow-hidden">
              <div class="bg-teal-500 h-full transition-all duration-300"
                  style="width: ${(index + 1) / questions.length * 100}%;"></div>
            </div>
          </div>

          <!-- Soal -->
          <h3 class="mt-6 md:text-lg text-md font-medium text-slate-800">${q.content}</h3>

          <!-- Pilihan Jawaban -->
          <div class="flex flex-col mt-5 gap-3">
            ${['A', 'B', 'C', 'D'].map(letter => `
              <div class="option w-full bg-slate-100 px-5 py-3 rounded-xl shadow hover:bg-teal-500 hover:text-white cursor-pointer transition duration-200 transform active:scale-95">
                <span class="font-bold mr-2">${letter} |</span> ${q[`option_${letter.toLowerCase()}`]}
              </div>
            `).join('')}
          </div>

          <!-- Navigasi -->
          <div class="flex flex-wrap gap-2 justify-end mt-7">
            <button id="prev-btn" onclick="previousQuestion()" class="flex items-center gap-1 bg-teal-500 text-white font-medium px-4 py-2 rounded-full hover:bg-teal-600 transition">
              <i data-feather="arrow-left" class="w-4 h-4"></i>
              <span class="text-sm md:text-base">Sebelumnya</span>
            </button>

            <button id="next-btn" onclick="nextQuestion()" class="flex items-center gap-1 bg-teal-500 text-white font-medium px-4 py-2 rounded-full hover:bg-teal-600 transition">
              <span class="text-sm md:text-base">Berikutnya</span>
              <i data-feather="arrow-right" class="w-4 h-4"></i>
            </button>

            <button id="submit-btn" onclick="submitQuestion()" class="hidden flex items-center gap-1 bg-slate-800 text-teal-400 font-medium px-4 py-2 rounded-full hover:bg-slate-700 transition">
              <span class="text-sm md:text-base">Selesai</span>
              <i data-feather="check-circle" class="w-4 h-4"></i>
            </button>
          </div>
        </div>
      `;

      // Toggle tombol
      const prevBtn = document.getElementById('prev-btn');
      const nextBtn = document.getElementById('next-btn');
      const submitBtn = document.getElementById('submit-btn');

      prevBtn.classList.toggle('hidden', currentIndex === 0);
      nextBtn.classList.toggle('hidden', currentIndex === questions.length - 1);
      submitBtn.classList.toggle('hidden', currentIndex !== questions.length - 1);

      // Handle pilihan jawaban
      const options = [...document.querySelectorAll('.option')];
      const savedAnswer = answers[currentIndex];
      if (savedAnswer) {
        const selectedIndex = ['A', 'B', 'C', 'D'].indexOf(savedAnswer);
        if (selectedIndex !== -1) {
          options[selectedIndex].classList.remove('bg-slate-100', 'text-slate-800');
          options[selectedIndex].classList.add('bg-teal-500', 'text-white');
        }
      }

      options.forEach((opt, i) => {
        opt.addEventListener('click', () => {
          // Reset semua
          options.forEach(el => {
            el.classList.remove('bg-teal-500', 'text-white');
            el.classList.add('bg-slate-100', 'text-slate-800');
          });

          // Tambah style ke yang dipilih
          opt.classList.remove('bg-slate-100', 'text-slate-800');
          opt.classList.add('bg-teal-500', 'text-white');

          // Simpan jawaban
          answers[currentIndex] = ['A', 'B', 'C', 'D'][i];
          correctAnswers[currentIndex] = (answers[currentIndex] === q.correct_answer) ? 'BENAR' : 'SALAH';
        });
      });

      feather.replace();
      initScoreToggle();
    }

    function showScore(score, persentageScore, correct, wrong, nul, total) {
      questionContent.innerHTML = `
        <div class="max-w-2xl mx-auto bg-gradient-to-br from-slate-800 to-slate-900 rounded-2xl p-8 shadow-xl mt-10 animate-fade-in">
          <div class="text-center space-y-4">
            <h1 class="font-bold md:text-3xl text-2xl text-teal-400 flex justify-center items-center gap-2">
              <i data-feather="check-circle" class="w-7 h-7 text-teal-300"></i>
              Selamat! Tryout Selesai
            </h1>

            <h3 class="text-teal-50 font-medium text-md md:text-lg">Total Skor Anda adalah:</h3>

            <h1 class="md:text-8xl text-6xl font-extrabold text-teal-400">
              ${persentageScore}
            </h1>

            <div class="text-sm md:text-base text-teal-100 space-y-1">
              <p><i data-feather="award" class="inline w-4 h-4 mr-1"></i> Skor Tryout: <strong>${score}</strong></p>
              <p><i data-feather="check" class="inline w-4 h-4 mr-1 text-green-400"></i> Benar: <strong>${correct}</strong></p>
              <p><i data-feather="x" class="inline w-4 h-4 mr-1 text-red-400"></i> Salah: <strong>${wrong}</strong></p>
              <p><i data-feather="slash" class="inline w-4 h-4 mr-1 text-yellow-400"></i> Tidak Dijawab: <strong>${nul}</strong></p>
              <p><i data-feather="list" class="inline w-4 h-4 mr-1 text-teal-300"></i> Total Soal: <strong>${total}</strong></p>
            </div>

            <div class="mt-8 flex flex-col md:flex-row justify-center gap-4">
              <a href="/" class="inline-flex items-center gap-2 bg-teal-500 hover:bg-teal-600 text-white font-semibold px-6 py-3 rounded-full transition duration-300">
                <i data-feather="home" class="w-5 h-5"></i> Kembali ke Beranda
              </a>

              <button id="btn-evaluation" class="inline-flex items-center gap-2 bg-white border border-teal-500 text-teal-600 font-semibold px-6 py-3 rounded-full hover:bg-teal-500 hover:text-white transition duration-300">
                <i data-feather="eye" class="w-5 h-5"></i> Lihat Evaluasi
              </button>
            </div>
          </div>
        </div>
      `;

      feather.replace();

      // Event: saat tombol evaluasi diklik
      document.getElementById('btn-evaluation').addEventListener('click', () => {
        renderEvaluation();
      });
    }

    function renderEvaluation() {
      questionContent.innerHTML = `
        <div class="mb-10 mt-40">
          <h2 class="text-3xl font-bold text-teal-500 mb-2 flex items-center gap-2">
            <i data-feather="clipboard" class="w-6 h-6"></i> Hasil Evaluasi
          </h2>
          <p class="text-slate-700">Berikut adalah hasil evaluasi dari jawabanmu.</p>
        </div>
      `;

      questions.forEach((q, index) => {
        const userAnswer = answers[index];
        const correctAnswer = q.correct_answer;
        const isCorrect = userAnswer === correctAnswer;

        const statusIcon = isCorrect
          ? '<i data-feather="check-circle" class="w-5 h-5 text-green-600"></i>'
          : '<i data-feather="x-circle" class="w-5 h-5 text-red-600"></i>';

        const colorClass = isCorrect
          ? 'border-green-500 bg-green-50'
          : 'border-red-500 bg-red-50';

        const html = `
          <div class="mb-8 border-l-4 ${colorClass} px-5 py-4 rounded-xl shadow-md">
            <div class="flex justify-between items-center mb-3">
              <h3 class="font-semibold text-lg text-slate-800">Soal ${index + 1}</h3>
              <div>${statusIcon}</div>
            </div>
            <p class="text-slate-700 mb-3">${q.content}</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-2 text-sm">
              <p>
                <span class="font-semibold text-slate-800">Jawaban Anda:</span>
                <span class="inline-block px-2 py-1 rounded-full font-bold ${isCorrect ? 'bg-green-200 text-green-700' : 'bg-red-200 text-red-700'}">
                  ${userAnswer ?? 'Tidak Dijawab'}
                </span>
              </p>
              <p>
                <span class="font-semibold text-slate-800">Jawaban Benar:</span>
                <span class="inline-block px-2 py-1 rounded-full bg-green-200 text-green-700 font-bold">
                  ${correctAnswer}
                </span>
              </p>
            </div>

            <p class="mt-2 text-sm">
              <span class="font-semibold text-slate-800">Status:</span> 
              <span class="${isCorrect ? 'text-green-600' : 'text-red-600'} font-semibold">
                ${isCorrect ? 'BENAR' : 'SALAH'}
              </span>
            </p>
          </div>
        `;

        questionContent.innerHTML += html;
      });

      questionContent.innerHTML += `
        <div class="my-12 text-center">
          <a href="/" class="inline-flex items-center gap-2 bg-teal-500 hover:bg-teal-600 text-white font-semibold px-6 py-3 rounded-full transition duration-300">
            <i data-feather="home" class="w-5 h-5"></i> Kembali ke Beranda
          </a>
        </div>
      `;

      feather.replace();
    }

    function previousQuestion() {
      if (currentIndex > 0) {
        currentIndex--;
        renderQuestion(currentIndex);
      }
    }

    function nextQuestion() {
      if (currentIndex < questions.length - 1) {
        currentIndex++;
        renderQuestion(currentIndex);
      }
    }

    function submitQuestion() {
      let score = 0;
      let persentageScore = 0;
      let correct = 0;
      let wrong = 0;
      let nul = 0;
      let total = 0;
      correctAnswers.map(answer => {
        total += 1;
        if(answer === 'BENAR'){
          score += 1;
          correct += 1;
        } else{
          if(!answer){
            score -= 1;
            nul += 1;
          } else{
            wrong += 1;
          }
        }
      })

      persentageScore = (score / total) * 100;
      persentageScore = persentageScore.toFixed(2);

      if(persentageScore < 0){
        persentageScore = 0;
      }

      storeHistory(score, persentageScore, correct, total);
      showScore(score, persentageScore, correct, wrong, nul, total);

    }

    function storeHistory(score, persentageScore, correct, total){
      const CURRENT_USER_ID = {{ Auth::user()->id }};
      const CURRENT_LEVEL_ID = {{ $level->id }};
      const CURRENT_SUBJECT_ID = {{ $subject->id }};

      const data = {
        user_id: CURRENT_USER_ID,
        level_id: CURRENT_LEVEL_ID,
        subject_id: CURRENT_SUBJECT_ID,
        score: score,
        persentage_score: persentageScore,
        total_questions: total,
        correct_answer: correct,
      }

      fetch('/histories', {
        method: 'POST',
        headers: {
          'Content-Type' : 'application/json',
          'X-CSRF-TOKEN' : '{{ csrf_token() }}'
        },
        body: JSON.stringify(data)
      })
      .then(response => {
        if (!response.ok) {
          throw new Error("HTTP error " + response.status);
        }
        return response.json();
      })
      .then(result => {
        console.log('data berhasil disimpan', result);
      })
      .catch(error => {
        console.log('gagal menyimpan data', error);
      });
    }

    function initScoreToggle() {
      const scoRules = document.querySelector("#score-rules");
      const scoContainer = document.querySelector("#score-container");

      if (!scoRules || !scoContainer) return;

      scoRules.addEventListener("mouseenter", () => {
        if (window.innerWidth >= 768) {
          scoContainer.classList.remove("hidden");
          scoContainer.classList.add("flex");
        }
      });

      scoRules.addEventListener("mouseleave", () => {
        if (window.innerWidth >= 768) {
          scoContainer.classList.add("hidden");
          scoContainer.classList.remove("flex");
        }
      });

      scoRules.addEventListener("click", () => {
        if (window.innerWidth <= 768) {
          scoContainer.classList.toggle("hidden");
          scoContainer.classList.toggle("flex");
        }
      });
    }

    renderQuestion(currentIndex);
  </script>
</body>
</html>