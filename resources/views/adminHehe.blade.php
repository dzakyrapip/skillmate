<x-app-layout>
    {{-- Background Music --}}
    <audio id="backgroundMusic" preload="auto" loop volume="0.3">
        <source src="https://cdn.pixabay.com/download/audio/2022/05/27/audio_1808fbf07a.mp3" type="audio/mpeg">
        <!-- Lofi background music -->
    </audio>

    {{-- Music Control Panel --}}
    <div class="fixed bottom-4 right-4 z-50">
        <div class="bg-white/90 backdrop-blur-sm rounded-full p-3 shadow-lg border border-gray-200">
            <button id="globalMusicToggle" class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 text-white rounded-full flex items-center justify-center transition-all duration-300 transform hover:scale-110">
                <i class="fas fa-music text-lg" id="globalMusicIcon"></i>
            </button>
        </div>
    </div>

    {{-- Hero Section --}}
    <div class="bg-gradient-to-br from-indigo-500 via-purple-600 to-pink-500 rounded-2xl p-8 mb-8 relative overflow-hidden">
        {{-- Background Pattern --}}
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-20 h-20 bg-white rounded-full transform -translate-x-10 -translate-y-10"></div>
            <div class="absolute top-10 right-10 w-16 h-16 bg-white rounded-full"></div>
            <div class="absolute bottom-0 right-0 w-24 h-24 bg-white rounded-full transform translate-x-12 translate-y-12"></div>
            <div class="absolute bottom-20 left-20 w-12 h-12 bg-white rounded-full"></div>
        </div>
        
        <div class="relative z-10 text-center text-white">
            <div class="mb-6">
                <h1 class="text-4xl md:text-5xl font-bold mb-4 animate-pulse">
                    管理者さん、がんばってね！ 💪💖
                </h1>
                <div class="w-24 h-1 bg-white/50 mx-auto rounded-full"></div>
            </div>
            
            <p class="text-lg md:text-xl mb-8 text-white/90 max-w-2xl mx-auto leading-relaxed">
                Kamu adalah cahaya dari project ini ✨<br>
                Jangan menyerah, teruslah semangat! Dunia butuh karya kamu 🫶
            </p>
            
            {{-- Stats Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                <div class="bg-white/20 backdrop-blur-sm rounded-xl p-6 text-center transform hover:scale-105 transition-all duration-300">
                    <div class="text-3xl mb-2">🚀</div>
                    <h3 class="font-semibold text-lg">Projects</h3>
                    <p class="text-white/80">Keep Building</p>
                </div>
                <div class="bg-white/20 backdrop-blur-sm rounded-xl p-6 text-center transform hover:scale-105 transition-all duration-300">
                    <div class="text-3xl mb-2">⭐</div>
                    <h3 class="font-semibold text-lg">Excellence</h3>
                    <p class="text-white/80">Always Improving</p>
                </div>
                <div class="bg-white/20 backdrop-blur-sm rounded-xl p-6 text-center transform hover:scale-105 transition-all duration-300">
                    <div class="text-3xl mb-2">💝</div>
                    <h3 class="font-semibold text-lg">Passion</h3>
                    <p class="text-white/80">Never Give Up</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Content Grid --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
        {{-- Motivation Card --}}
        <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
            <div class="flex items-center mb-6">
                <div class="w-12 h-12 bg-gradient-to-r from-pink-500 to-purple-500 rounded-full flex items-center justify-center text-white text-xl">
                    🌸
                </div>
                <h2 class="text-2xl font-bold text-gray-800 ml-4">Daily Motivation</h2>
            </div>
            
            <div class="space-y-4">
                <div class="bg-gradient-to-r from-pink-50 to-purple-50 rounded-xl p-6 text-center">
                    <p class="text-lg font-medium text-gray-700 mb-2">
                        🌸 今日はきっと素敵な日になるよ！ 🌸
                    </p>
                    <p class="text-gray-600 italic">
                        (Hari ini pasti akan menjadi hari yang indah!)
                    </p>
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <div class="text-center p-4 bg-blue-50 rounded-lg">
                        <div class="text-2xl mb-2">💪</div>
                        <p class="text-sm font-medium text-gray-700">Stay Strong</p>
                    </div>
                    <div class="text-center p-4 bg-green-50 rounded-lg">
                        <div class="text-2xl mb-2">✨</div>
                        <p class="text-sm font-medium text-gray-700">Keep Shining</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Quick Actions --}}
        <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
            <div class="flex items-center mb-6">
                <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center text-white text-xl">
                    🙏
                </div>
                <h2 class="text-2xl font-bold text-gray-800 ml-4">Best Regards</h2>
            </div>
            
            <div class="space-y-6">
                <div class="text-center">
                    <p class="text-lg text-gray-700 mb-4 leading-relaxed">
                        Semoga hari-harimu selalu dipenuhi kebahagiaan dan kesuksesan. 
                        Terima kasih telah menjadi bagian yang luar biasa! 💝
                    </p>
                </div>
                
                <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl p-6 text-center">
                    <div class="text-3xl mb-3">🌟</div>
                    <p class="text-gray-700 font-medium mb-2">
                        "Every great achievement starts with a single step"
                    </p>
                    <p class="text-sm text-gray-500 italic">
                        - Keep believing in yourself -
                    </p>
                </div>
                
                <div class="text-center">
                    <p class="text-gray-600">
                        With love and appreciation,<br>
                        <span class="font-semibold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-pink-500">
                            Your Support Team 💖
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Inspiration Gallery --}}
    <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Inspiration Gallery</h2>
            <p class="text-gray-600">Beautiful moments to keep you motivated</p>
            <div class="w-16 h-1 bg-gradient-to-r from-pink-500 to-purple-500 mx-auto mt-4 rounded-full"></div>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="group relative overflow-hidden rounded-2xl shadow-lg">
                <img src="https://i.pinimg.com/736x/e0/4f/7c/e04f7caba851fd7702b07b3ae7e05322.jpg" alt="Inspiration 1" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="absolute bottom-4 left-4 text-white">
                        <p class="font-medium">Stay Focused 🎯</p>
                    </div>
                </div>
            </div>
            
            <div class="group relative overflow-hidden rounded-2xl shadow-lg">
                <img src="https://i.pinimg.com/1200x/dc/de/21/dcde219dcef13af4c01b8eaa2588e937.jpg" alt="Inspiration 2" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="absolute bottom-4 left-4 text-white">
                        <p class="font-medium">Dream Big 💫</p>
                    </div>
                </div>
            </div>
            
            <div class="group relative overflow-hidden rounded-2xl shadow-lg">
                <img src="https://i.pinimg.com/736x/6a/78/71/6a78714b6a3e6896d99331cca50b1dad.jpg" alt="Inspiration 3" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="absolute bottom-4 left-4 text-white">
                        <p class="font-medium">Keep Going 🚀</p>
                    </div>
                </div>
            </div>
            
            <div class="group relative overflow-hidden rounded-2xl shadow-lg">
                <img src="https://i.pinimg.com/1200x/ee/dc/98/eedc98c2b84938cfe4ccc2769ab5fea4.jpg" alt="Inspiration 4" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="absolute bottom-4 left-4 text-white">
                        <p class="font-medium">Be Amazing ✨</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Progress Section --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
        <div class="bg-gradient-to-br from-purple-50 to-pink-100 rounded-2xl p-8">
            <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-music text-pink-500 mr-3"></i>
                Admin's Favorite Song
            </h3>
            <div class="space-y-4">
                <div class="bg-white rounded-xl p-4 shadow-sm">
                    <div class="flex items-center justify-between mb-3">
                        <div>
                            <h4 class="font-semibold text-gray-800">Let Down - Radiohead</h4>
                            <p class="text-sm text-gray-600">From OK Computer (1997) 🎭</p>
                        </div>
                        <div class="text-2xl">🎸</div>
                    </div>
                    
                    <div class="flex items-center space-x-3">
                        <button id="playPauseBtn" class="bg-gradient-to-r from-pink-500 to-purple-500 hover:from-pink-600 hover:to-purple-600 text-white w-10 h-10 rounded-full flex items-center justify-center transition-all duration-300 transform hover:scale-105">
                            <i class="fas fa-play" id="playIcon"></i>
                        </button>
                        
                        <div class="flex-1">
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div id="progressBar" class="bg-gradient-to-r from-pink-500 to-purple-500 h-2 rounded-full transition-all duration-300" style="width: 0%"></div>
                            </div>
                        </div>
                        
                        <button id="volumeBtn" class="text-gray-500 hover:text-pink-500 transition-colors">
                            <i class="fas fa-volume-up" id="volumeIcon"></i>
                        </button>
                    </div>
                </div>
                
                <div class="text-center">
                    <p class="text-sm text-gray-600">🎭 "Transport, motorways and tramlines..." - A masterpiece that never gets old</p>
                </div>
            </div>
            
            <audio id="bgMusic" preload="auto">
                <source src="{{ asset('audio/let-down.mp3') }}" type="audio/mpeg">
                <source src="{{ asset('audio/let-down.ogg') }}" type="audio/ogg">
            </audio>
        </div>
        
        <div class="bg-gradient-to-br from-pink-50 to-purple-100 rounded-2xl p-8">
            <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-heart text-pink-500 mr-3"></i>
                Motivation Level
            </h3>
            <div class="text-center">
                <div class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-purple-500 mb-2">
                    100%
                </div>
                <p class="text-gray-600">You're doing amazing! Keep it up! 💪</p>
                <div class="flex justify-center mt-4 space-x-2">
                    <div class="w-3 h-3 bg-pink-400 rounded-full animate-bounce"></div>
                    <div class="w-3 h-3 bg-purple-400 rounded-full animate-bounce" style="animation-delay: 0.1s"></div>
                    <div class="w-3 h-3 bg-indigo-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const bgMusic = document.getElementById('backgroundMusic');
            const globalToggle = document.getElementById('globalMusicToggle');
            const globalIcon = document.getElementById('globalMusicIcon');
            
            const localMusic = document.getElementById('bgMusic');
            const playPauseBtn = document.getElementById('playPauseBtn');
            const playIcon = document.getElementById('playIcon');
            const progressBar = document.getElementById('progressBar');
            const volumeBtn = document.getElementById('volumeBtn');
            const volumeIcon = document.getElementById('volumeIcon');
            
            let isGlobalPlaying = false;
            let isLocalPlaying = false;
            let isMuted = false;
            
            globalToggle.addEventListener('click', function() {
                if (isGlobalPlaying) {
                    bgMusic.pause();
                    globalIcon.className = 'fas fa-music text-lg';
                    isGlobalPlaying = false;
                } else {
                    bgMusic.play().catch(e => console.log('Audio play failed:', e));
                    globalIcon.className = 'fas fa-pause text-lg';
                    isGlobalPlaying = true;
                }
            });
            
            if (playPauseBtn && localMusic) {
                playPauseBtn.addEventListener('click', function() {
                    if (isLocalPlaying) {
                        localMusic.pause();
                        playIcon.className = 'fas fa-play';
                        isLocalPlaying = false;
                    } else {
                        if (isGlobalPlaying) {
                            bgMusic.pause();
                            globalIcon.className = 'fas fa-music text-lg';
                            isGlobalPlaying = false;
                        }
                        
                        localMusic.play().catch(e => console.log('Local audio play failed:', e));
                        playIcon.className = 'fas fa-pause';
                        isLocalPlaying = true;
                    }
                });
                
                volumeBtn.addEventListener('click', function() {
                    if (isMuted) {
                        localMusic.volume = 0.5;
                        volumeIcon.className = 'fas fa-volume-up';
                        isMuted = false;
                    } else {
                        localMusic.volume = 0;
                        volumeIcon.className = 'fas fa-volume-mute';
                        isMuted = true;
                    }
                });
                
                localMusic.addEventListener('timeupdate', function() {
                    if (localMusic.duration) {
                        const progress = (localMusic.currentTime / localMusic.duration) * 100;
                        progressBar.style.width = progress + '%';
                    }
                });
                
                localMusic.addEventListener('ended', function() {
                    playIcon.className = 'fas fa-play';
                    isLocalPlaying = false;
                    progressBar.style.width = '0%';
                });
            }
            
            document.addEventListener('click', function() {
                if (!isGlobalPlaying && !isLocalPlaying) {
                    bgMusic.play().catch(e => console.log('Auto-play failed:', e));
                    globalIcon.className = 'fas fa-pause text-lg';
                    isGlobalPlaying = true;
                }
            }, { once: true });
        });
    </script>
</x-app-layout>