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
</head>
<body>
  <section id="question" class="flex w-full h-[100vh] justify-center items-center bg-teal-50">
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
        <h1 class="md:text-4xl text-2xl text-slate-800 font-bold">${q.level.name}</h1>
        <h2 class="md:text-2xl text-xl text-teal-500 font-semibold mt-6">${q.subject.name}</h2>
        <h3 class="md:text-xl text-lg text-slate-800 font-mono mt-2">Kategori: ${q.category.name}</h3>
        <div class="w-full mt-5">
          <div class="flex justify-between">
            <h5 class="font-normal text-slate-800 md:text-base text-sm">${index + 1} dari ${questions.length}</h5>
            <div class="flex gap-1 items-center md:text-base text-sm font-bold text-red-800 hover:underline relative" id="score-rules">
              <h4>Aturan Score</h4>
              <i data-feather="info" class="w-5 h-5"></i>
              <div class="absolute hidden flex-wrap items-center justify-start bg-red-50 rounded-3xl border border-red-800 w-50 py-2 px-4 right-0 top-8" id="score-container">
                <h6 class="font-medium text-shadow-sm text-red-800">Benar = +1 Point</h6>
                <h6 class="font-medium text-shadow-sm text-red-800">Salah = 0 Point</h6>
                <h6 class="font-medium text-shadow-sm text-red-800">Tidak Jawab = -1 Point</h6>
              </div>
            </div>
          </div>
          <div class="w-full bg-slate-300 h-[2px] mt-1">
            <div class="bg-teal-500 h-[2px]" style="width:${((index + 1) / questions.length) * 100}%;"></div>
          </div>
        </div>
        <h3 class="mt-4 md:text-lg text-md font-normal text-slate-800">${q.content}</h3>
        <div class="flex flex-col mt-6">
          <div class="option w-full bg-slate-300 px-5 py-2 mt-3 hover:bg-teal-500">
            <h5><span class="font-bold mr-2">A |</span> ${q.option_a}</h5>
          </div>
          <div class="option w-full bg-slate-300 px-5 py-2 mt-3 hover:bg-teal-500">
            <h5><span class="font-bold mr-2">B |</span> ${q.option_b}</h5>
          </div>
          <div class="option w-full bg-slate-300 px-5 py-2 mt-3 hover:bg-teal-500">
            <h5><span class="font-bold mr-2">C |</span> ${q.option_c}</h5>
          </div>
          <div class="option w-full bg-slate-300 px-5 py-2 mt-3 hover:bg-teal-500">
            <h5><span class="font-bold mr-2">D |</span> ${q.option_d}</h5>
          </div>
        </div>
        <div class="flex gap-2 justify-end mt-7">
          <button id="prev-btn" onclick="previousQuestion()" class="flex gap-1 items-center justify-center bg-teal-500 rounded-3xl px-4 py-2 hover:opacity-80 text-slate-800">
            <i data-feather="arrow-left" class="md:w-6 md:h-6 w-4 h-4"></i>
            <span class="font-mono md:text-base text-sm">Previous</span>
          </button>
          <button id="next-btn" onclick="nextQuestion()" class="flex gap-1 items-center justify-center bg-teal-500 rounded-3xl px-4 py-2 hover:opacity-80 text-slate-800">
            <span class="font-mono md:text-base text-sm">Next</span>
            <i data-feather="arrow-right" class="md:w-6 md:h-6 w-4 h-4"></i>
          </button>
          <button id="submit-btn" onclick="submitQuestion()" class="hidden flex gap-1 items-center justify-center bg-slate-800 rounded-3xl px-4 py-2 hover:opacity-80 text-teal-500">
            <span class="font-mono md:text-base text-sm">Finish</span>
            <i data-feather="arrow-right" class="md:w-6 md:h-6 w-4 h-4"></i>
          </button>
        </div>
      `;

      // Handle tombol navigasi
      const prevBtn = document.querySelector('#prev-btn');
      const nextBtn = document.querySelector('#next-btn');
      const submitBtn = document.querySelector('#submit-btn');

      prevBtn.classList.toggle('hidden', currentIndex === 0);
      nextBtn.classList.toggle('hidden', currentIndex === questions.length - 1);
      submitBtn.classList.toggle('hidden', currentIndex !== questions.length - 1);

      // Jawaban yang dipilih
      const options = [...document.querySelectorAll('.option')];
      const savedAnswer = answers[currentIndex];
      if (savedAnswer) {
        const selectedIndex = ['A', 'B', 'C', 'D'].indexOf(savedAnswer);
        if (selectedIndex !== -1) {
          options[selectedIndex].classList.add('bg-teal-500');
        }
      }

      for (let i = 0; i < options.length; i++) {
        options[i].addEventListener('click', function () {
          for (let j = 0; j < options.length; j++) {
            options[j].classList.remove('bg-teal-500');
          }

          options[i].classList.add('bg-teal-500');

          answers[currentIndex] = ['A', 'B', 'C', 'D'][i];

          if(answers[currentIndex] === q.correct_answer){
            correctAnswers[currentIndex] = 'BENAR';
          } else{
            correctAnswers[currentIndex] = 'SALAH';
          }
        });
      }

      feather.replace();
      initScoreToggle();
    }

    function showScore(score, persentageScore, correct, wrong, nul, total){
      questionContent.innerHTML = `<div class="mx-auto bg-slate-800 rounded-xl py-4 px-10">
        <h1 class="font-bold md:text-2xl text-xl text-center text-teal-500">Selamat anda sudah menyelesaikan Tryout</h1>
        <h3 class="text-teal-50 font-medium mt-6 md:text-lg text-md text-center">Total score Tryout anda adalah ${score}</h3>
        <h3 class="text-teal-50 font-medium mt-1 md:text-lg text-md text-center">Anda Mendapatkan Score</h3>
        <h1 class="md:text-8xl text-6xl font-bold text-teal-500 mb-3 mt-6 text-center">${persentageScore}</h1>
        <h5 class="md:text-md text-sm mt-1 font-medium text-teal-50 text-center">Benar ${correct}; Salah ${wrong} ;Tidak dijawab ${nul};</h5>
        <h5 class="md:text-md text-sm mt-1 font-medium text-teal-50 text-center">Dari ${total} soal</h5>
        <div class="flex justify-end mt-8">
          <a href="/" class="md:px-8 md:py-3 px-5 py-2 bg-teal-500 text-teal-50 rounded-2xl md:text-xl text-md font-medium">Selesai</a>
        </div>
      </div>`
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

      persentageScore = (score / total) * 100

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

  <script>
    feather.replace();
  </script>
</body>
</html>