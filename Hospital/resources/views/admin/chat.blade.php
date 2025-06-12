<!DOCTYPE html>
<html   lang="en" >

<head>
      <title>Dashboard</title>
  @include('admin.css');

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <script src="https://unpkg.com/htmx.org@1.9.2"></script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class=" bg-surface">
	<main>

		<!--start the project-->
		<div id="main-wrapper" class="flex p-5 xl:pr-0">
			<aside id="application-sidebar-brand"
				class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full  transform hidden xl:block xl:translate-x-0 xl:end-auto xl:bottom-0 fixed xl:top-[90px] xl:left-auto top-0 left-0 with-vertical h-screen z-[999] shrink-0  w-[270px] shadow-md xl:rounded-md rounded-none bg-white left-sidebar   transition-all duration-300" >
				<!-- ---------------------------------- -->
         @include('admin.sideBar')

			</aside>
			<div class=" w-full page-wrapper xl:px-6 px-0">

				<!-- Main Content -->
				<main class="h-full  max-w-full">
					<div class="container full-container p-0 flex flex-col gap-6">
					<!--  Header Start -->
				@include('admin.header')
				<!--  Header End -->
                 <div class="container full-container p-0 flex flex-col gap-6
            flex-grow
            justify-center items-center
            min-h-[calc(100vh-90px)]">
  <!-- The 90px is your header height based on your sidebar class -->

  <section class="bg-white rounded-lg shadow-lg w-full max-w-md flex flex-col h-[600px]">

    <header class="bg-blue-400 text-white py-4 px-6 rounded-t-lg text-center font-semibold text-xl">
      AI Health Assistant
    </header>

    <div class="flex-1 overflow-y-auto p-6 space-y-4" id="chat">
      <div class="bg-blue-100 text-blue-900 rounded-xl p-4 max-w-[70%]">
        Hi, how can I help you?
      </div>
    </div>

    <form id="chat-form" class="flex border-t border-blue-300 p-4 gap-3">
      <input
        type="text"
        placeholder="Ask me anything..."
        class="flex-1 rounded-full border border-blue-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
        id="user-input"
        autocomplete="off"
        required
      />
      <button
        type="submit"
        class="bg-blue-500 hover:bg-blue-600 text-white rounded-full px-5 py-2 font-semibold transition"
      >
        Send
      </button>
    </form>

  </section>
</div>


				</main>
				<!-- Main Content End -->
				
			</div>
		</div>
		<!--end of project-->
	</main>
  <script type="importmap">
    {
      "imports": {
        "@google/generative-ai": "https://esm.run/@google/generative-ai"
      }
    }
  </script>

<script type="module">
  import { GoogleGenerativeAI } from "https://esm.run/@google/generative-ai";

  const API_KEY = "AIzaSyAKtZuv9XKqb58EX8WDOFpVN8t259IWObw";

  const hospitalInfo = `
You are a helpful assistant for a hospital website. Your job is to help users:

- Understand which doctor they should visit based on symptoms.
- Offer general guidance on common illnesses (e.g., viral flu, cold, stomach issues).
- Answer politely and clearly.
- Never diagnose or prescribe—just guide users in the right direction.

Example 1:
User: I'm having chest pain.
Assistant: That may be related to your heart. Please consult a cardiologist immediately.

Example 2:
User: I have fever, cough, and nausea.
Assistant: These symptoms may indicate a viral infection. You should visit a general physician.

Always end with: "Please consult a medical professional for proper diagnosis."
`;

  const genAI = new GoogleGenerativeAI(API_KEY);

  const model = genAI.getGenerativeModel({
    model: "gemini-2.0-flash",
    systemInstruction: hospitalInfo,
  });

  let messages = {
    history: [],
  };

  const chatDiv = document.getElementById("chat");
  const chatForm = document.getElementById("chat-form");
  const userInput = document.getElementById("user-input");

  chatForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    const userMessage = userInput.value.trim();
    if (!userMessage) return;

    // Add user message to chat window
    const userMsgDiv = document.createElement("div");
    userMsgDiv.classList.add("bg-blue-100", "text-blue-900", "rounded-xl", "p-4", "max-w-[70%]", "self-end");
    userMsgDiv.textContent = userMessage;
    chatDiv.appendChild(userMsgDiv);

    // Clear input
    userInput.value = "";

    // Add loader
    const loaderDiv = document.createElement("div");
    loaderDiv.classList.add("loader", "text-center", "py-2");
    loaderDiv.textContent = "Loading...";
    chatDiv.appendChild(loaderDiv);

    try {
      // Start chat and get streaming response
      const chat = model.startChat(messages);
      const result = await chat.sendMessageStream(userMessage);

      // Create container for model response
      const modelMsgDiv = document.createElement("div");
      modelMsgDiv.classList.add("bg-blue-200", "text-blue-900", "rounded-xl", "p-4", "max-w-[70%]", "self-start");
      chatDiv.appendChild(modelMsgDiv);

      let modelResponse = "";

      for await (const chunk of result.stream) {
        const chunkText = chunk.text();
        modelResponse += chunkText;
        modelMsgDiv.textContent = modelResponse;
        // Auto scroll to bottom
        chatDiv.scrollTop = chatDiv.scrollHeight;
      }

      // Save conversation history
      messages.history.push({ role: "user", parts: [{ text: userMessage }] });
      messages.history.push({ role: "model", parts: [{ text: modelResponse }] });
    } catch (error) {
      console.error("Error sending message:", error);
      const errorDiv = document.createElement("div");
      errorDiv.classList.add("text-red-600", "py-2");
      errorDiv.textContent = "The message could not be sent. Please try again.";
      chatDiv.appendChild(errorDiv);
    } finally {
      // Remove loader
      loaderDiv.remove();
    }
  });
</script>

@include('admin.js')

</body>

</html>
