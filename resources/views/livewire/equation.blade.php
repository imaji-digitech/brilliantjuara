<div>
    <div id="question"></div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            var question = new MathEditor('question', 0, '');
            question.setLatex({{ $equation }})
        });
    </script>
</div>
