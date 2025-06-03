import $, { event } from 'jquery';
window.$ = $;
window.jQuery = $;

$(function () {
    let prevQuery = ''
    $('#name').on('input', async function (event) {
        if (event.target.value && prevQuery.localeCompare(event.target.value)) {
            prevQuery = event.target.value
            const url = `http://localhost:8000/api/teams/?filter[name]=%${event.target.value}%`
            const response = await fetch(url, {
                method: "GET",
                mode: "same-origin",
                cache: "no-cache",
                credentials: "same-origin",
                headers: {
                    "Accept": "application/json",
                },
                redirect: "follow",
                referrerPolicy: "no-referrer",
            });
            if (!response.ok) {
                console.log('Всё сломалось');
            }
            const data = await response.json();
            console.log(data);

            $('#team-results').empty();
            const teams = Array.isArray(data) ? data : [];
            teams.forEach(team => {
                const emblem = team.attributes.emblem && team.attributes.emblem.trim() !== ''
                    ? team.attributes.emblem
                    : '/images/emblem-placeholder.jpg'; // путь к заглушке

                const teamElement = $(`
                    <article class="team-item" style="display: flex; align-items: center; padding: 10px; border-bottom: 1px solid #ddd; cursor: pointer;">
                    <img src="${emblem}" alt="${team.attributes.name}" style="width: 40px; height: 40px; margin-right: 15px;">
                    <span>${team.attributes.name}</span>
                    </article>
                    `);
                teamElement.on('click', function () {
                    $('#team_id').val(team.id);
                    $('.team-item').css('background-color', '');
                    $(this).css('background-color', '#e6f3ff');
                });
                $('#team-results').append(teamElement);

            });
        }
    });
});