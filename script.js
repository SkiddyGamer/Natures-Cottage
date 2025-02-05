const postList = document.getElementById('post-list');
const postForm = document.getElementById('post-form');

// Array to store posts
let posts = [];

// Function to render posts
function renderPosts() {
	postList.innerHTML = '';
	posts.forEach((post, index) => {
		const postElement = document.createElement('div');
		postElement.className = 'post';
		postElement.innerHTML = `
            <img src="${post.image}" alt="${post.title}" />
            <h3>${post.title}</h3>
            <p>${post.description}</p>
            <button onclick="viewPost(${index})">View</button>
        `;
		postList.appendChild(postElement);
	});
}

// Add new post
postForm.addEventListener('submit', (e) => {
	e.preventDefault();
	const title = document.getElementById('title').value;
	const description = document.getElementById('description').value;
	const image = document.getElementById('image').value;

	posts.push({ title, description, image });
	renderPosts();

	// Clear the form
	postForm.reset();
});

// View post functionality
function viewPost(index) {
	const post = posts[index];
	localStorage.setItem('viewedPost', JSON.stringify(post));
	window.location.href = 'post.html';
}

// Initial render
renderPosts();
