Usage:

1. change .env file configuration (if needed)
2. create `questionnaire` table in your DB
3. run 'php artisan key:generate'
4. run 'php artisan migrate'
5. for API access set Header: `Authorization` = {API_KEY} (API_KEY from .env)
6. API routes variables:
	{id} - `questionnaire`.`id`
	{secret} - `questionnaire`.`secret` (generate automatically)
7. API routes:
	(GET)../api/questions - get list of questions with answers
	(POST)../api/questions - create new question
	(PUT)../api/questions/{id} - update question via `id`
	(DELETE)../api/questions{id} - delete question via `id`
	(GET)../api/questions{secret} - get question via `secret` token
	(POST)../api/questions{secret} - set answer via `secret` token
	(GET)../answers - get list of answers
	(GET)../answers/statistics/pie-chart - get answers pie chart
	(GET)../answers/statistics/bar-chart - get answers bar chart
8. tests: run 'php artisan test'
