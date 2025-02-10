const postList = document.getElementById('post-list');
const postForm = document.getElementById('post-form');

let posts = [];

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

postForm.addEventListener('submit', (e) => {
	e.preventDefault();
	const title = document.getElementById('title').value;
	const description = document.getElementById('description').value;
	const image = document.getElementById('image').value;

	posts.push({ title, description, image });
	renderPosts();

	postForm.reset();
});

function viewPost(index) {
	const post = posts[index];
	localStorage.setItem('viewedPost', JSON.stringify(post));
	window.location.href = 'post.html';
}

renderPosts();

$(function () {
	$('#from').datepicker({
		dateFormat: 'yy-mm-dd',
		minDate: 0,
		onSelect: function (selectedDate) {
			$('#to').datepicker('option', 'minDate', selectedDate);
		},
	});

	$('#to').datepicker({
		dateFormat: 'yy-mm-dd',
		minDate: 0,
		onSelect: function (selectedDate) {
			$('#from').datepicker('option', 'maxDate', selectedDate);
		},
	});
});

const signUpButton = document.getElementById('signUpButton');
const signInButton = document.getElementById('signInButton');
const signInForm = document.getElementById('signIn');
const signUpForm = document.getElementById('signup');

signUpButton.addEventListener('click', function () {
	signInForm.style.display = 'none';
	signUpForm.style.display = 'block';
});
signInButton.addEventListener('click', function () {
	signInForm.style.display = 'block';
	signUpForm.style.display = 'none';
});
